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
        /** @var User $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Unauthenticated'], 401);
        }

        $patient = $repo->findOneByUser($user);

        return $this->json([
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
            'patient' => $patient ? [
                'gender' => $patient->getGender(),
                'language' => $patient->getLanguage(),
            ] : null,
        ]);
    }

    #[Route('/me', methods: ['PUT'])]
    public function updateMe(
        Request $request,
        PatientRepository $repo,
        EntityManagerInterface $em
    ): JsonResponse {
        /** @var User $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Unauthenticated'], 401);
        }

        $patient = $repo->findOneByUser($user);
        if (!$patient) {
            return $this->json(['error' => 'Patient profile not found'], 404);
        }

        $data = json_decode($request->getContent(), true);
        if (!is_array($data)) {
            $data = $request->request->all();
        }

        if (array_key_exists('fullName', $data)) {
            $user->setFullName((string) $data['fullName']);
        }
        if (array_key_exists('email', $data)) {
            $user->setEmail((string) $data['email']);
        }
        if (array_key_exists('country', $data)) {
            $user->setCountry((string) $data['country']);
        }
        if (array_key_exists('contact', $data)) {
            $user->setContact((string) $data['contact']);
        }
        if (array_key_exists('whatsapp', $data)) {
            $user->setWhatsapp((bool) $data['whatsapp']);
        }
        if (array_key_exists('telegram', $data)) {
            $user->setTelegram((bool) $data['telegram']);
        }
        if (array_key_exists('gender', $data)) {
            $patient->setGender($data['gender'] !== '' ? (string) $data['gender'] : null);
        }
        if (array_key_exists('language', $data)) {
            $patient->setLanguage($data['language'] !== '' ? (string) $data['language'] : null);
        }

        $em->flush();

        return $this->json(['success' => true]);
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
