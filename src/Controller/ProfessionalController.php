<?php

namespace App\Controller;

use App\Entity\Professional;
use App\Repository\ProfessionalRepository;
use App\Service\ProfessionalService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/professionals')]
class ProfessionalController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function list(ProfessionalRepository $repo): JsonResponse
    {
        return $this->json($repo->findAll());
    }

    #[Route('', methods: ['POST'])]
    public function create(Request $request, ProfessionalService $service): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Unauthenticated'], 401);
        }

        $professional = $service->create($data ?? [], $user);

        return $this->json($professional, 201);
    }

    #[Route('/{id}', methods: ['GET'])]
    public function getOne(Professional $professional): JsonResponse
    {
        return $this->json($professional);
    }

    #[Route('/{id}', methods: ['PUT'])]
    public function update(
        Professional $professional,
        Request $request,
        ProfessionalService $service
    ): JsonResponse {

        $data = json_decode($request->getContent(), true);
        $updated = $service->update($professional, $data);

        return $this->json($updated);
    }

    #[Route('/{id}', methods: ['DELETE'])]
    public function delete(
        Professional $professional,
        EntityManagerInterface $em
    ): JsonResponse {

        $em->remove($professional);
        $em->flush();

        return $this->json(['message' => 'Professional removed']);
    }

    #[Route('/me', methods: ['GET'])]
    public function me(ProfessionalRepository $repo): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Unauthenticated'], 401);
        }

        $professional = $repo->findOneByUser($user);
        if (!$professional) {
            return $this->json(['error' => 'Professional profile not found'], 404);
        }

        $adDetails = $professional->getAdDetails();

        return $this->json([
            'id' => $professional->getId(),
            'expertise' => $professional->getExpertise(),
            'paymentCompleted' => $professional->isPaymentCompleted(),
            'adDetails' => $adDetails ? json_decode($adDetails, true) : null,
            'user' => [
                'id' => $user->getId(),
                'fullName' => $user->getFullName(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'country' => $user->getCountry(),
                'contact' => $user->getContact(),
                'whatsapp' => $user->isWhatsapp(),
                'telegram' => $user->isTelegram(),
                'roles' => $user->getRoles(),
            ],
        ]);
    }

    #[Route('/ad-details', methods: ['POST'])]
    public function saveAdDetails(
        Request $request,
        ProfessionalRepository $repo,
        EntityManagerInterface $em
    ): JsonResponse {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Unauthenticated'], 401);
        }

        $professional = $repo->findOneByUser($user);
        if (!$professional) {
            return $this->json(['error' => 'Professional profile not found'], 404);
        }

        $data = json_decode($request->getContent(), true);
        if (!is_array($data)) {
            $data = $request->request->all();
        }

        $professional->setAdDetails(json_encode($data, JSON_UNESCAPED_UNICODE));
        $em->flush();

        return $this->json(['success' => true]);
    }
}
