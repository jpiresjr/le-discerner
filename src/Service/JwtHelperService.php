<?php

namespace App\Service;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class JwtHelperService
{
    public function __construct(
        private JWTTokenManagerInterface $jwtManager
    ) {}

    public function generateToken(User $user): string
    {
        return $this->jwtManager->create($user);
    }
}
