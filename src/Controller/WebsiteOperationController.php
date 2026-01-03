<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class WebsiteOperationController extends AbstractController
{
    #[Route('/website-operation', name: 'website-operation')]
    public function index()
    {
        ob_start();
        require __DIR__ . '/../View/website-operation.php';
        $content = ob_get_clean();

        $title = 'Web-Operation';
        $extraCss = [];

        ob_start();
        require __DIR__ . '/../View/layout.php';
        return new Response(ob_get_clean());


    }

}
