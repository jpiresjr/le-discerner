<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
}
