<?php

namespace App\Controller;

use App\Repository\ProfessionalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ProfessionalRepository $professionalRepository): Response
    {
        $professionals = [];
        foreach ($professionalRepository->findAll() as $professional) {
            $user = $professional->getUser();
            if (!$user) {
                continue;
            }
            $adDetails = $professional->getAdDetails();
            $adData = $adDetails ? json_decode($adDetails, true) : [];
            $name = trim((string) $user->getFullName());
            $photo = $adData['photoPath'] ?? null;
            if (is_array($photo)) {
                $photo = $photo[0] ?? null;
            }

            $professionals[] = [
                'id' => $professional->getId(),
                'name' => $name ?: $user->getUsername(),
                'specialty' => (string) ($adData['specialty'] ?? $professional->getExpertise() ?? ''),
                'description' => (string) ($adData['description'] ?? 'Professional available for personalised sessions'),
                'photo' => $photo ?: '/images/profissional-1.jpg',
            ];
        }

        return $this->render('public/home.html.twig', [
            'title' => 'Le Discerner',
            'featuredProfessionals' => array_chunk($professionals, 3),
            'extraCss' => [],
            'extraJs' => [
                'https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js',
            ],
        ]);
    }
}
