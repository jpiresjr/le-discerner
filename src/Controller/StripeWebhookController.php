<?php

namespace App\Controller;

use App\Repository\ProfessionalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Stripe\StripeClient;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class StripeWebhookController extends AbstractController
{
    public function __construct(
        private readonly string $stripeWebhookSecret,
        private readonly string $stripeSecretKey
    ) {}

    #[Route('/api/payments/webhook', methods: ['POST'])]
    public function handleStripeWebhook(
        Request $request,
        ProfessionalRepository $professionals,
        EntityManagerInterface $em,
        LoggerInterface $logger
    ): JsonResponse {
        $payload = $request->getContent();
        $signature = $request->headers->get('stripe-signature');

        if ($this->stripeWebhookSecret === '') {
            $logger->warning('Stripe webhook secret is missing.');
            return $this->json(['error' => 'Webhook secret not configured.'], 500);
        }

        try {
            $event = Webhook::constructEvent($payload, (string) $signature, $this->stripeWebhookSecret);
        } catch (SignatureVerificationException $exception) {
            $logger->warning('Stripe webhook signature verification failed.', [
                'message' => $exception->getMessage(),
            ]);
            return $this->json(['error' => 'Invalid signature.'], 400);
        } catch (\UnexpectedValueException $exception) {
            $logger->warning('Stripe webhook payload is invalid JSON.', [
                'message' => $exception->getMessage(),
            ]);
            return $this->json(['error' => 'Invalid payload.'], 400);
        }

        $type = $event->type ?? 'unknown';
        $logger->info('Stripe webhook received.', ['type' => $type]);

        $paymentIntent = null;
        $metadata = [];
        if (isset($event->data->object) && $event->data->object instanceof \Stripe\PaymentIntent) {
            $paymentIntent = $event->data->object;
        } elseif (isset($event->data->object->payment_intent)) {
            $paymentIntent = $event->data->object->payment_intent;
        }

        if ($paymentIntent instanceof \Stripe\PaymentIntent) {
            $metadata = $paymentIntent->metadata ? $paymentIntent->metadata->toArray() : [];
        } elseif (is_string($paymentIntent) && $paymentIntent !== '') {
            if ($this->stripeSecretKey !== '') {
                $stripe = new StripeClient($this->stripeSecretKey);
                $intent = $stripe->paymentIntents->retrieve($paymentIntent, []);
                $metadata = $intent->metadata ? $intent->metadata->toArray() : [];
                $paymentIntent = $intent;
            }
        }

        $professionalId = $metadata['professional_id'] ?? null;
        if ($professionalId) {
            $professional = $professionals->find($professionalId);
            if ($professional) {
                $status = $paymentIntent instanceof \Stripe\PaymentIntent
                    ? $paymentIntent->status
                    : $type;

                $professional->setPaymentStatus($status);
                $professional->setPaymentProviderId($paymentIntent instanceof \Stripe\PaymentIntent ? $paymentIntent->id : null);
                $professional->setPaymentUpdatedAt(new \DateTimeImmutable());
                if ($status === 'succeeded') {
                    $professional->setPaymentCompleted(true);
                }

                $em->flush();
                $logger->info('Professional payment status updated.', [
                    'professional_id' => $professionalId,
                    'status' => $status,
                ]);
            } else {
                $logger->warning('Stripe webhook professional not found.', [
                    'professional_id' => $professionalId,
                ]);
            }
        } else {
            $logger->warning('Stripe webhook missing professional_id metadata.');
        }

        return $this->json(['received' => true]);
    }
}
