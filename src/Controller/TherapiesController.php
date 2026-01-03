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
        ob_start();
        require __DIR__ . '/../View/therapies.php';
        $content = ob_get_clean();

        $title = 'Therapies';
        $extraCss = [];
        $extraJs = [];

        ob_start();
        require __DIR__ . '/../View/layout.php';
        return new Response(ob_get_clean());
    }
}
