<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\PatientRepository;
use App\Repository\ProfessionalRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/admin')]
class AdminController extends AbstractController
{
    #[Route('/overview', methods: ['GET'])]
    public function overview(UserRepository $userRepository): JsonResponse
    {
        $users = $userRepository->findBy([], ['createdAt' => 'DESC'], 20);
        $allUsers = $userRepository->findAll();

        $now = new \DateTimeImmutable('first day of this month');
        $growthBuckets = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = $now->modify("-{$i} months");
            $key = $month->format('Y-m');
            $growthBuckets[$key] = [
                'label' => $month->format('M Y'),
                'count' => 0,
            ];
        }

        $stats = [
            'total' => 0,
            'patients' => 0,
            'professionals' => 0,
            'monthlyRevenue' => 0,
        ];

        $payloadUsers = [];

        foreach ($allUsers as $user) {
            $stats['total']++;

            if (in_array(User::ROLE_PATIENT, $user->getRoles(), true)) {
                $stats['patients']++;
            }

            if (in_array(User::ROLE_PROFESSIONAL, $user->getRoles(), true)) {
                $stats['professionals']++;
            }

            $createdKey = $user->getCreatedAt()->format('Y-m');
            if (isset($growthBuckets[$createdKey])) {
                $growthBuckets[$createdKey]['count']++;
            }
        }

        foreach ($users as $user) {
            $payloadUsers[] = [
                'id' => $user->getId(),
                'fullName' => $user->getFullName(),
                'email' => $user->getEmail(),
                'username' => $user->getUsername(),
                'roles' => $user->getRoles(),
                'createdAt' => $user->getCreatedAt()->format('Y-m-d H:i'),
            ];
        }

        $alerts = [
            [
                'title' => 'Nenhuma pendência crítica no momento.',
                'type' => 'info',
            ],
        ];

        return $this->json([
            'stats' => $stats,
            'users' => $payloadUsers,
            'growth' => array_values($growthBuckets),
            'upcomingAppointments' => [],
            'alerts' => $alerts,
        ]);
    }

    #[Route('/patients', methods: ['GET'])]
    public function patients(Request $request, PatientRepository $patientRepository): JsonResponse
    {
        $filters = [
            'search' => trim((string) $request->query->get('search')),
            'therapyType' => $request->query->get('therapyType'),
            'status' => $request->query->get('status'),
            'dateFrom' => $request->query->get('dateFrom'),
            'dateTo' => $request->query->get('dateTo'),
        ];

        $patients = $patientRepository->search($filters);
        $payload = [];

        foreach ($patients as $patient) {
            $user = $patient->getUser();
            $payload[] = [
                'id' => $patient->getId(),
                'fullName' => $user->getFullName(),
                'email' => $user->getEmail(),
                'phone' => $user->getContact(),
                'therapyType' => $patient->getTherapyType(),
                'status' => $patient->getStatus() ?? 'ativo',
                'createdAt' => $user->getCreatedAt()->format('Y-m-d'),
                'details' => [
                    'username' => $user->getUsername(),
                    'country' => $user->getCountry(),
                    'whatsapp' => $user->isWhatsapp(),
                    'telegram' => $user->isTelegram(),
                    'gender' => $patient->getGender(),
                    'language' => $patient->getLanguage(),
                ],
            ];
        }

        return $this->json([
            'patients' => $payload,
        ]);
    }

    #[Route('/professionals', methods: ['GET'])]
    public function professionals(Request $request, ProfessionalRepository $professionalRepository): JsonResponse
    {
        $filters = [
            'search' => trim((string) $request->query->get('search')),
            'category' => $request->query->get('category'),
            'status' => $request->query->get('status'),
        ];

        $professionals = $professionalRepository->search($filters);
        $payload = [];

        foreach ($professionals as $professional) {
            $user = $professional->getUser();
            $payload[] = [
                'id' => $professional->getId(),
                'fullName' => $user->getFullName(),
                'email' => $user->getEmail(),
                'category' => $professional->getSpecialtyCategory(),
                'specialty' => $professional->getExpertise(),
                'verificationStatus' => $professional->getVerificationStatus() ?? 'pendente',
                'ratingAverage' => $professional->getRatingAverage(),
                'ratingCount' => $professional->getRatingCount(),
                'financialHistory' => $professional->getFinancialHistory(),
                'credentials' => $professional->getCredentials(),
                'certifications' => $professional->getCertifications(),
                'verificationDocs' => $professional->getVerificationDocs(),
            ];
        }

        return $this->json([
            'professionals' => $payload,
        ]);
    }
}
