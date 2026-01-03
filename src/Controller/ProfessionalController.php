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
        dd('teetet');
        $data = json_decode($request->getContent(), true);
        $professional = $service->create($data);

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
}
