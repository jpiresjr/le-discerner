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
        return $this->render('public/website_operation.html.twig', [
            'title' => 'Web-Operation',
            'extraCss' => [],
            'extraJs' => [
                'https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js',
            ],
        ]);
    }

}
