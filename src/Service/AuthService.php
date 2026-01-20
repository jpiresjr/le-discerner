<?php
namespace App\Service;

use App\Repository\UserRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AuthService
{
    public function __construct(
        private UserRepository $userRepository,
        private UserPasswordHasherInterface $hasher,
        private JWTTokenManagerInterface $jwtManager,
        private EntityManagerInterface $em
    ) {}

    public function login(string $identifier, string $password): ?string
    {
        $user = $this->userRepository->findByIdentifier($identifier);

        if (!$user || !$this->hasher->isPasswordValid($user, $password)) {
            return null;
        }

        return $this->jwtManager->create($user);
    }
}
