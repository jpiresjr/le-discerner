<?php

namespace App\Service;

use App\Entity\Professional;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class ProfessionalService
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    public function create(array $data, User $user): Professional
    {
        $p = new Professional();
        $p->setUser($user);
        $p->setExpertise($data['expertise'] ?? null);

        $this->em->persist($p);
        $this->em->flush();

        return $p;
    }

    public function update(Professional $p, array $data): Professional
    {
        $p->setExpertise($data['expertise'] ?? $p->getExpertise());
        if (array_key_exists('paymentCompleted', $data)) {
            $p->setPaymentCompleted((bool) $data['paymentCompleted']);
        }

        $this->em->flush();

        return $p;
    }
}
