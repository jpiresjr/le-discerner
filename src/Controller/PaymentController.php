<?php

namespace App\Controller;

use App\Repository\ProfessionalRepository;
use App\Service\PaymentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;

class PaymentController extends AbstractController
{
    #[Route('/api/payments/create-link', methods: ['POST'])]
    public function createPaymentLink(
        Request $request,
        PaymentService $payment,
        ProfessionalRepository $professionals,
        EntityManagerInterface $em,
        LoggerInterface $logger
    ): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Unauthenticated'], 401);
        }

        $professional = $professionals->findOneBy(['user' => $user]);
        if (!$professional) {
            return $this->json(['error' => 'Professional profile not found'], 404);
        }

        $logger->info('Creating Stripe payment link.', [
            'user_id' => $user->getId(),
            'professional_id' => $professional->getId(),
            'ip' => $request->getClientIp(),
        ]);

        try {
            $link = $payment->createPaymentLink($professional, 3000); // 30€ = 3000 cents
            $professional->setPaymentStatus('pending');
            $professional->setPaymentProviderId($link['payment_link_id']);
            $professional->setPaymentUpdatedAt(new \DateTimeImmutable());
            $em->flush();
        } catch (\Throwable $exception) {
            $logger->error('Failed to create Stripe payment link.', [
                'professional_id' => $professional->getId(),
                'error' => $exception->getMessage(),
            ]);

            return $this->json(['error' => 'Payment link creation failed.'], 500);
        }

        return $this->json([
            'payment_url' => $link['url'],
        ]);
    }
}
