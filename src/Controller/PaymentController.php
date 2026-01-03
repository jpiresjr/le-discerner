<?php

namespace App\Controller;

use App\Service\PaymentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class PaymentController extends AbstractController
{
    #[Route('/api/payments/create-link', methods: ['POST'])]
    public function createPaymentLink(PaymentService $payment): JsonResponse
    {
        $url = $payment->createPaymentLink(3000); // 30€ = 3000 cents

        return $this->json([
            'payment_url' => $url
        ]);
    }
}
