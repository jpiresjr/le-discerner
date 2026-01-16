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
}
