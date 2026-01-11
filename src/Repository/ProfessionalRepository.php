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

    public function search(array $filters = []): array
    {
        $qb = $this->createQueryBuilder('professional')
            ->join('professional.user', 'user')
            ->addSelect('user')
            ->orderBy('user.createdAt', 'DESC');

        if (!empty($filters['category'])) {
            $qb->andWhere('professional.specialtyCategory = :category')
                ->setParameter('category', $filters['category']);
        }

        if (!empty($filters['status'])) {
            $qb->andWhere('professional.verificationStatus = :status')
                ->setParameter('status', $filters['status']);
        }

        if (!empty($filters['search'])) {
            $qb->andWhere('LOWER(user.fullName) LIKE :search OR LOWER(user.email) LIKE :search')
                ->setParameter('search', '%' . mb_strtolower($filters['search']) . '%');
        }

        return $qb->getQuery()->getResult();
    }
}
