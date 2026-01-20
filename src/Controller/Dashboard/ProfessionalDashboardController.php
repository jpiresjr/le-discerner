<?php

namespace App\Controller\Dashboard;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/dashboard/professional')]
class ProfessionalDashboardController extends AbstractController
{
    public function __construct(
        private readonly string $stripePublishableKey
    ) {}

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
        return $this->render('dashboard/payment.html.twig', [
            'title' => 'Pagamento',
            'stripePublishableKey' => $this->stripePublishableKey,
            'extraCss' => [
                'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css',
                '/assets/css/payment.css',
            ],
            'extraJs' => [
                'https://js.stripe.com/v3/',
                '/assets/js/payment.js',
            ],
        ]);
    }
}
