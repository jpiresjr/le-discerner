<?php

namespace App\Controller\Dashboard;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/dashboard/professional')]
class ProfessionalDashboardController extends AbstractController
{
    #[Route('', name: 'professional_dashboard')]
    public function index(): Response
    {
        ob_start();
        require __DIR__ . '/../../View/dashboard/professional.php';
        $content = ob_get_clean();

        $title = 'Painel Profissional';
        $extraJs = ['/assets/js/dashboard-professional.js'];

        ob_start();
        require __DIR__ . '/../../View/layout.php';
        return new Response(ob_get_clean());
    }

    #[Route('/payment', name: 'professional_payment')]
    public function payment(): Response
    {
        ob_start();
        require __DIR__ . '/../../View/payment.php';
        $content = ob_get_clean();

        $title = 'Pagamento';
        $extraJs = ['/assets/js/payment.js'];

        ob_start();
        require __DIR__ . '/../../View/layout.php';
        return new Response(ob_get_clean());
    }
}
