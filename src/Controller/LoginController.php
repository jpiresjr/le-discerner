<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function index(): Response
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 'on');
        ob_start();
        require __DIR__ . '/../View/login.php';
        $content = ob_get_clean();

        $title = 'Login';
        $extraCss = [];
        $extraJs  = ['/assets/js/login.js'];

        ob_start();
        require __DIR__ . '/../View/layout.php';
        return new Response(ob_get_clean());
    }

}
