<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\Professional;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProfessionalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Professional::class);
    }

    public function findOneByUser(User $user): ?Professional
    {
        return $this->findOneBy(['user' => $user]);
    }
}
