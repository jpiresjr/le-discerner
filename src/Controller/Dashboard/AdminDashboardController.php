<?php

namespace App\Controller\Dashboard;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/dashboard/admin')]
class AdminDashboardController extends AbstractController
{
    #[Route('', name: 'admin_dashboard')]
    public function index(): Response
    {
        ob_start();
        require __DIR__ . '/../../View/dashboard/admin.php';
        $content = ob_get_clean();

        $title = 'Painel Admin';
        $extraJs = ['/assets/js/dashboard-admin.js'];

        ob_start();
        require __DIR__ . '/../../View/layout.php';
        return new Response(ob_get_clean());
    }
}
