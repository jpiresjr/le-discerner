<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\User;
use App\Repository\PatientRepository;
use App\Service\PatientService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/patients')]
class PatientController extends AbstractController
{
    #[Route('/me', methods: ['GET'])]
    public function me(PatientRepository $repo): JsonResponse
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 'on');
        /** @var User $user */
        $user = $this->getUser();

        $patient = $repo->findOneByUser($user);

        return $this->json([
            'fullName' => $user->getFullName(),
            'email' => $user->getEmail(),
            'gender' => $patient?->getGender(),
            'language' => $patient?->getLanguage(),
        ]);
    }

    #[Route('', methods: ['GET'])]
    public function list(PatientRepository $repo): JsonResponse
    {
        $patients = $repo->findAll();

        return $this->json($patients);
    }

    #[Route('', methods: ['POST'])]
    public function create(Request $request, PatientService $service): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $patient = $service->create($data);

        return $this->json([
            'id'     => $patient->getId(),
            'userId' => $patient->getUser()->getId(),
            'message' => 'Patient registered successfully'
        ], 201);
    }

    #[Route('/{id}', methods: ['GET'])]
    public function getOne(Patient $patient): JsonResponse
    {
        return $this->json($patient);
    }

    #[Route('/{id}', methods: ['PUT'])]
    public function update(
        Patient $patient,
        Request $request,
        PatientService $service
    ): JsonResponse {

        $data = json_decode($request->getContent(), true);

        $updated = $service->update($patient, $data);

        return $this->json($updated);
    }

    #[Route('/{id}', methods: ['DELETE'])]
    public function delete(
        Patient $patient,
        EntityManagerInterface $em
    ): JsonResponse {

        $em->remove($patient);
        $em->flush();

        return $this->json(['message' => 'Patient removed']);
    }


}
