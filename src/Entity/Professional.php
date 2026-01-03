<?php

namespace App\Entity;

use App\Repository\ProfessionalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfessionalRepository::class)]
#[ORM\Table(name: "professionals")]
class Professional
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\OneToOne(targetEntity: User::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(nullable: false)]
    private User $user;

    #[ORM\Column(type: "boolean")]
    private bool $paymentCompleted = false;

    public function getId(): ?int { return $this->id; }

    public function getUser(): User { return $this->user; }
    public function setUser(User $user): self { $this->user = $user; return $this; }

    public function isPaymentCompleted(): bool { return $this->paymentCompleted; }
    public function setPaymentCompleted(bool $done): self { $this->paymentCompleted = $done; return $this; }
}
