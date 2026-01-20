<?php

namespace App\Controller\Dashboard;

use App\Entity\User;
use App\Repository\ProfessionalRepository;
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
    public function index(ProfessionalRepository $professionalRepository): Response
    {
        /** @var User|null $user */
        $user = $this->getUser();
        $professional = $user ? $professionalRepository->findOneByUser($user) : null;
        $adDetails = $professional?->getAdDetails();
        $bootstrapPayload = $user && $professional ? [
            'id' => $professional->getId(),
            'expertise' => $professional->getExpertise(),
            'paymentCompleted' => $professional->isPaymentCompleted(),
            'paymentStatus' => $professional->getPaymentStatus(),
            'paymentProviderId' => $professional->getPaymentProviderId(),
            'paymentUpdatedAt' => $professional->getPaymentUpdatedAt()?->format(DATE_ATOM),
            'adDetails' => $adDetails ? json_decode($adDetails, true) : null,
            'user' => [
                'id' => $user->getId(),
                'fullName' => $user->getFullName(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'country' => $user->getCountry(),
                'contact' => $user->getContact(),
                'whatsapp' => $user->isWhatsapp(),
                'telegram' => $user->isTelegram(),
                'roles' => $user->getRoles(),
            ],
        ] : null;
        $professionalBootstrapJson = $bootstrapPayload ? json_encode(
            $bootstrapPayload,
            JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE
        ) : null;

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
