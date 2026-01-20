<?php
namespace App\Repository;

use App\Entity\Patient;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PatientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Patient::class);
    }

    public function findOneByUser(User $user): ?Patient
    {
        return $this->findOneBy(['user' => $user]);
    }

    public function search(array $filters = []): array
    {
        $qb = $this->createQueryBuilder('patient')
            ->join('patient.user', 'user')
            ->addSelect('user')
            ->orderBy('user.createdAt', 'DESC');

        if (!empty($filters['search'])) {
            $qb->andWhere('LOWER(user.fullName) LIKE :search OR LOWER(user.email) LIKE :search OR LOWER(user.contact) LIKE :search')
                ->setParameter('search', '%' . mb_strtolower($filters['search']) . '%');
        }

        if (!empty($filters['therapyType'])) {
            $qb->andWhere('patient.therapyType = :therapyType')
                ->setParameter('therapyType', $filters['therapyType']);
        }

        if (!empty($filters['status'])) {
            $qb->andWhere('patient.status = :status')
                ->setParameter('status', $filters['status']);
        }

        if (!empty($filters['dateFrom'])) {
            $qb->andWhere('user.createdAt >= :dateFrom')
                ->setParameter('dateFrom', new \DateTimeImmutable($filters['dateFrom']));
        }

        if (!empty($filters['dateTo'])) {
            $qb->andWhere('user.createdAt <= :dateTo')
                ->setParameter('dateTo', new \DateTimeImmutable($filters['dateTo']));
        }

        return $qb->getQuery()->getResult();
    }
}
