<?php
namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'users')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private string $email;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    #[ORM\Column(length: 255)]
    private string $password;

    #[ORM\Column(length: 255)]
    private string $fullName;

    #[ORM\Column(length: 100, unique: true)]
    private string $username;

    #[ORM\Column(length: 100)]
    private string $country;

    #[ORM\Column(length: 50)]
    private string $contact;

    #[ORM\Column(type: 'boolean')]
    private bool $whatsapp = false;

    #[ORM\Column(type: 'boolean')]
    private bool $telegram = false;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $createdAt;
    public const ROLE_PATIENT = 'ROLE_PATIENT';
    public const ROLE_PROFESSIONAL = 'ROLE_PROFESSIONAL';


    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    // --- Getters / Setters ---
    public function getId(): ?int { return $this->id; }

    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email): self { $this->email = $email; return $this; }

    public function getUserIdentifier(): string { return $this->email; } // used by Symfony

    public function getRoles(): array { return array_unique(array_merge($this->roles, ['ROLE_USER'])); }
    public function setRoles(array $roles): self { $this->roles = $roles; return $this; }

    public function getPassword(): string { return $this->password; }
    public function setPassword(string $password): self { $this->password = $password; return $this; }

    public function eraseCredentials(): void { /* if you store temp sensitive data */ }

    public function getFullName(): string { return $this->fullName; }
    public function setFullName(string $fullName): self { $this->fullName = $fullName; return $this; }

    public function getUsername(): string { return $this->username; }
    public function setUsername(string $username): self { $this->username = $username; return $this; }

    public function getCountry(): string { return $this->country; }
    public function setCountry(string $country): self { $this->country = $country; return $this; }

    public function getContact(): string { return $this->contact; }
    public function setContact(string $contact): self { $this->contact = $contact; return $this; }

    public function isWhatsapp(): bool { return $this->whatsapp; }
    public function setWhatsapp(bool $whatsapp): self { $this->whatsapp = $whatsapp; return $this; }

    public function isTelegram(): bool { return $this->telegram; }
    public function setTelegram(bool $telegram): self { $this->telegram = $telegram; return $this; }

    public function getCreatedAt(): \DateTimeInterface { return $this->createdAt; }
}
