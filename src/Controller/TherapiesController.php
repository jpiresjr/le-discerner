<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TherapiesController extends AbstractController
{
    #[Route('/therapies', name: 'therapies')]
    public function index(): Response
    {
        return $this->render('public/therapies.html.twig', [
            'title' => 'Therapies',
            'extraCss' => [
                'https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css',
            ],
            'extraJs' => [
                'https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js',
            ],
        ]);
    }
}
