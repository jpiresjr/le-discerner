<?php
namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientRepository::class)]
#[ORM\Table(name: 'patients')]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\OneToOne(targetEntity: User::class, cascade: ['persist','remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private User $user;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $gender = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $language = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $therapyType = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $status = null;

    public function getId(): ?int { return $this->id; }

    public function getUser(): User { return $this->user; }
    public function setUser(User $user): self { $this->user = $user; return $this; }

    public function getGender(): ?string { return $this->gender; }
    public function setGender(?string $gender): self { $this->gender = $gender; return $this; }

    public function getLanguage(): ?string { return $this->language; }
    public function setLanguage(?string $language): self { $this->language = $language; return $this; }

    public function getTherapyType(): ?string { return $this->therapyType; }
    public function setTherapyType(?string $therapyType): self { $this->therapyType = $therapyType; return $this; }

    public function getStatus(): ?string { return $this->status; }
    public function setStatus(?string $status): self { $this->status = $status; return $this; }
}
