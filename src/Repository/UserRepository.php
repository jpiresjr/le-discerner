<?php
namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->findOneBy(['email' => $email]);
    }

    public function findByIdentifier(string $identifier): ?User
    {
        $normalized = mb_strtolower($identifier);

        return $this->createQueryBuilder('user')
            ->where('LOWER(user.email) = :identifier')
            ->orWhere('LOWER(user.username) = :identifier')
            ->setParameter('identifier', $normalized)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
