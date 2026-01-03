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
//        dd('asdasdasd');
        // 1) monta o conteúdo da página
        ob_start();
        require __DIR__ . '/../View/home.php';
        $content = ob_get_clean();

        // 2) variáveis usadas no layout
        $title = 'Le Discerner';
        $extraCss = ['/assets/css/app.css'];
        $extraJs  = ['/assets/js/app.js'];

        // 3) monta o layout
        ob_start();
        require __DIR__ . '/../View/layout.php';
        return new Response(ob_get_clean());
    }
}

