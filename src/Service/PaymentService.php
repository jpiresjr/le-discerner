<?php

namespace App\Service;

use App\Entity\Professional;
use Stripe\StripeClient;

class PaymentService
{
    private StripeClient $stripe;
    private string $priceId;

    public function __construct(string $secretKey, string $priceId = '')
    {
        $this->stripe = new StripeClient($secretKey);
        $this->priceId = $priceId;
    }

    /**
     * @return array{url: string, payment_link_id: string}
     */
    public function createPaymentLink(Professional $professional, int $amountCents): array
    {
        $priceId = $this->priceId;
        if ($priceId === '') {
            $product = $this->stripe->products->create([
                'name' => 'Mensalidade Plataforma Le-Discerner',
            ]);

            $price = $this->stripe->prices->create([
                'unit_amount' => $amountCents,
                'currency' => 'eur',
                'product' => $product->id,
            ]);
            $priceId = $price->id;
        }

        $paymentLink = $this->stripe->paymentLinks->create([
            'line_items' => [
                [
                    'price' => $priceId,
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
        ];
    }
}
