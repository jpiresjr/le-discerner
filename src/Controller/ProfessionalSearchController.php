<?php

namespace App\Controller;

use App\Entity\Professional;
use App\Repository\ProfessionalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/professionals')]
class ProfessionalSearchController extends AbstractController
{
    #[Route('', name: 'professional_search')]
    public function index(ProfessionalRepository $professionalRepository): Response
    {
        $items = [];
        foreach ($professionalRepository->findAll() as $professional) {
            $user = $professional->getUser();
            if (!$user) {
                continue;
            }
            $adDetails = $professional->getAdDetails();
            $adData = $adDetails ? json_decode($adDetails, true) : [];
            $name = trim((string) $user->getFullName());

            $items[] = [
                'id' => $professional->getId(),
                'name' => $name ?: $user->getUsername(),
                'specialty' => (string) ($adData['specialty'] ?? $professional->getExpertise() ?? ''),
                'adDetails' => $adData ?: null,
            ];
        }

        return $this->render('public/professionals.html.twig', [
            'title' => 'Buscar Profissionais',
            'professionalsBootstrap' => $items,
            'extraCss' => [
                'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css',
                '/assets/css/search-professionals.css',
            ],
            'extraJs' => [
                '/assets/js/search-professionals.js',
            ],
        ]);
    }

    #[Route('/{id}', name: 'professional_profile', requirements: ['id' => '\\d+'])]
    public function profile(Professional $professional): Response
    {
        $user = $professional->getUser();
        if (!$user) {
            return new RedirectResponse('/professionals');
        }

        $adDetails = $professional->getAdDetails();
        $adData = $adDetails ? json_decode($adDetails, true) : [];

        $name = trim((string) $user->getFullName());
        $photo = $adData['photoPath'] ?? null;
        if (is_array($photo)) {
            $photo = $photo[0] ?? null;
        }

        return $this->render('public/professional_profile.html.twig', [
            'title' => $name ?: $user->getUsername(),
            'professional' => [
                'id' => $professional->getId(),
                'name' => $name ?: $user->getUsername(),
                'specialty' => (string) ($adData['specialty'] ?? $professional->getExpertise() ?? ''),
                'badge' => $adData['category'] ?? 'Disponível',
                'price' => isset($adData['price']) && $adData['price'] !== '' ? 'R$ ' . $adData['price'] : null,
                'duration' => isset($adData['duration']) && $adData['duration'] !== '' ? $adData['duration'] . ' min' : null,
                'country' => $adData['country'] ?? '',
                'location' => $adData['location'] ?? '',
                'category' => $adData['category'] ?? '',
                'contact' => $adData['phone'] ?? $user->getContact(),
                'description' => $adData['description'] ?? '',
                'portfolio' => $adData['portfolio'] ?? '',
                'education' => $adData['education'] ?? '',
                'socialMedia' => $adData['socialMedia'] ?? '',
                'photo' => $photo ?: '/images/image1.jpg',
            ],
            'extraCss' => [
                'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css',
            ],
        ]);
    }
}
