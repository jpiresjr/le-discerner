<?php
namespace App\Service;

use App\Entity\Patient;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PatientService
{
    public function __construct(
        private EntityManagerInterface $em,
        private UserPasswordHasherInterface $hasher
    ) {}

    public function createFromPayload(array $data, User $user): Patient
    {
        $patient = new Patient();
        $patient->setUser($user);
        $patient->setGender($data['gender'] ?? null);
        $patient->setLanguage($data['language'] ?? null);

        $this->em->persist($patient);
        $this->em->flush();

        return $patient;
    }
    public function update(Patient $patient, array $data): Patient
    {
        $user = $patient->getUser();

        $user->setFullName($data['fullName'] ?? $user->getFullName());
        $user->setUsername($data['username'] ?? $user->getUsername());
        $user->setEmail($data['email'] ?? $user->getEmail());
        $user->setCountry($data['country'] ?? $user->getCountry());
        $user->setContact($data['contact'] ?? $user->getContact());
        if (array_key_exists('whatsapp', $data)) {
            $user->setWhatsapp((bool) $data['whatsapp']);
        }

        if (!empty($data['password'])) {
            $hashed = $this->hasher->hashPassword($user, $data['password']);
            $user->setPassword($hashed);
        }

        $patient->setGender($data['gender'] ?? $patient->getGender());
        $patient->setLanguage($data['language'] ?? $patient->getLanguage());

        $this->em->flush();

        return $patient;
    }
}
