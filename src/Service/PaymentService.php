<?php

namespace App\Service;

use App\Entity\Professional;
use Stripe\StripeClient;

class PaymentService
{
    private StripeClient $stripe;

    public function __construct(string $secretKey)
    {
        $this->stripe = new StripeClient($secretKey);
    }

    /**
     * @return array{url: string, payment_link_id: string}
     */
    public function createPaymentLink(Professional $professional, int $amountCents): array
    {
        $product = $this->stripe->products->create([
            'name' => 'Mensalidade Plataforma Le-Discerner',
        ]);

        $price = $this->stripe->prices->create([
            'unit_amount' => $amountCents,
            'currency' => 'eur',
            'product' => $product->id,
        ]);

        $paymentLink = $this->stripe->paymentLinks->create([
            'line_items' => [
                [
                    'price' => $price->id,
                    'quantity' => 1,
                ]
            ],
            'metadata' => [
                'professional_id' => (string) $professional->getId(),
            ],
            'payment_intent_data' => [
                'metadata' => [
                    'professional_id' => (string) $professional->getId(),
                ],
            ],
        ]);

        return [
            'url' => $paymentLink->url,
            'payment_link_id' => $paymentLink->id,
        ];
    }

    /**
     * @return array{client_secret: string, payment_intent_id: string}
     */
    public function createPaymentIntent(Professional $professional, int $amountCents): array
    {
        $intent = $this->stripe->paymentIntents->create([
            'amount' => $amountCents,
            'currency' => 'eur',
            'metadata' => [
                'professional_id' => (string) $professional->getId(),
            ],
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);

        return [
            'client_secret' => $intent->client_secret,
            'payment_intent_id' => $intent->id,
        ]);

        return [
            'client_secret' => $intent->client_secret,
            'payment_intent_id' => $intent->id,
        ]);

        return [
            'url' => $paymentLink->url,
            'payment_link_id' => $paymentLink->id,
        ];
    }
}
