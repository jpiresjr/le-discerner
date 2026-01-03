<?php

namespace App\Service;

use Stripe\StripeClient;

class PaymentService
{
    private StripeClient $stripe;

    public function __construct(string $secretKey)
    {
        $this->stripe = new StripeClient($secretKey);
    }

    public function createPaymentLink(int $amountCents): string
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
        ]);

        return $paymentLink->url;
    }
}
