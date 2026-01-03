<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'about')]
    public function index(): Response
    {

        ob_start();
        require __DIR__ . '/../View/about.php';
        $content = ob_get_clean();

        $title = 'Sobre nós';
        $extraCss = [];

        ob_start();
        require __DIR__ . '/../View/layout.php';
        return new Response(ob_get_clean());
    }
}
