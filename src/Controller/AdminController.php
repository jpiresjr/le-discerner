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

        $stats = [
            'total' => 0,
            'patients' => 0,
            'professionals' => 0,
        ];

        $payloadUsers = [];

        foreach ($users as $user) {
            $stats['total']++;

            if (in_array(User::ROLE_PATIENT, $user->getRoles(), true)) {
                $stats['patients']++;
            }

            if (in_array(User::ROLE_PROFESSIONAL, $user->getRoles(), true)) {
                $stats['professionals']++;
            }

            $payloadUsers[] = [
                'id' => $user->getId(),
                'fullName' => $user->getFullName(),
                'email' => $user->getEmail(),
                'username' => $user->getUsername(),
                'roles' => $user->getRoles(),
                'createdAt' => $user->getCreatedAt()->format('Y-m-d H:i'),
            ];
        }

        return $this->json([
            'stats' => $stats,
            'users' => $payloadUsers,
        ]);
    }
}
