<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/professionals')]
class ProfessionalSearchController extends AbstractController
{
    #[Route('', name: 'professional_search')]
    public function index(): Response
    {
        return $this->render('public/professionals.html.twig', [
            'title' => 'Buscar Profissionais',
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
