<?php

namespace App\Service;

use App\Entity\Professional;
use Doctrine\ORM\EntityManagerInterface;

class ProfessionalService
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    public function create(array $data): Professional
    {
        $p = new Professional();

        $p->setFirstName($data['firstName'] ?? '');


        $this->em->persist($p);
        $this->em->flush();

        return $p;
    }

    public function update(Professional $p, array $data): Professional
    {
        $p->setFirstName($data['firstName'] ?? $p->getFirstName());
        $p->setLastName($data['lastName'] ?? $p->getLastName());
        $p->setUsername($data['username'] ?? $p->getUsername());
        $p->setEmail($data['email'] ?? $p->getEmail());
        $p->setCountry($data['country'] ?? $p->getCountry());
        $p->setPhone($data['phone'] ?? $p->getPhone());
        $p->setWhatsapp($data['whatsapp'] ?? $p->getWhatsapp());

        $this->em->flush();

        return $p;
    }
}
