<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('public/home.html.twig', [
            'title' => 'Le Discerner',
            'extraCss' => [],
            'extraJs' => [
                'https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js',
            ],
        ]);
    }
}
