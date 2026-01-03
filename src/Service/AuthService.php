<?php
namespace App\Service;

use App\Repository\UserRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AuthService
{
    public function __construct(
        private UserRepository $userRepository,
        private UserPasswordHasherInterface $hasher,
        private JWTTokenManagerInterface $jwtManager
    ) {}

    public function login(string $identifier, string $password): ?string
    {
        $user = $this->userRepository->findOneBy(['email' => $identifier]);

        if (!$user) {
            $user = $this->userRepository->findOneBy(['username' => $identifier]);
        }

        if (!$user) {
            return null;
        }

        if (!$this->hasher->isPasswordValid($user, $password)) {
            return null;
        }

        // ⚠️ ESTE É O PONTO CRÍTICO
        return $this->jwtManager->create($user);
    }
}
