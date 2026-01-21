<?php

namespace App\Controller;

use App\Repository\ProfessionalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
