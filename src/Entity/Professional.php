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

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $expertise = null;

    #[ORM\Column(type: "string", length: 50, nullable: true)]
    private ?string $specialtyCategory = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $credentials = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $certifications = null;

    #[ORM\Column(type: "float", nullable: true)]
    private ?float $ratingAverage = null;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $ratingCount = null;

    #[ORM\Column(type: "string", length: 30, nullable: true)]
    private ?string $verificationStatus = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $verificationDocs = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $financialHistory = null;

    public function getId(): ?int { return $this->id; }

    public function getUser(): User { return $this->user; }
    public function setUser(User $user): self { $this->user = $user; return $this; }

    public function isPaymentCompleted(): bool { return $this->paymentCompleted; }
    public function setPaymentCompleted(bool $done): self { $this->paymentCompleted = $done; return $this; }

    public function getExpertise(): ?string { return $this->expertise; }
    public function setExpertise(?string $expertise): self { $this->expertise = $expertise; return $this; }

    public function getSpecialtyCategory(): ?string { return $this->specialtyCategory; }
    public function setSpecialtyCategory(?string $specialtyCategory): self { $this->specialtyCategory = $specialtyCategory; return $this; }

    public function getCredentials(): ?string { return $this->credentials; }
    public function setCredentials(?string $credentials): self { $this->credentials = $credentials; return $this; }

    public function getCertifications(): ?string { return $this->certifications; }
    public function setCertifications(?string $certifications): self { $this->certifications = $certifications; return $this; }

    public function getRatingAverage(): ?float { return $this->ratingAverage; }
    public function setRatingAverage(?float $ratingAverage): self { $this->ratingAverage = $ratingAverage; return $this; }

    public function getRatingCount(): ?int { return $this->ratingCount; }
    public function setRatingCount(?int $ratingCount): self { $this->ratingCount = $ratingCount; return $this; }

    public function getVerificationStatus(): ?string { return $this->verificationStatus; }
    public function setVerificationStatus(?string $verificationStatus): self { $this->verificationStatus = $verificationStatus; return $this; }

    public function getVerificationDocs(): ?string { return $this->verificationDocs; }
    public function setVerificationDocs(?string $verificationDocs): self { $this->verificationDocs = $verificationDocs; return $this; }

    public function getFinancialHistory(): ?string { return $this->financialHistory; }
    public function setFinancialHistory(?string $financialHistory): self { $this->financialHistory = $financialHistory; return $this; }
}
