<?php

namespace App\Services;

use App\Contracts\PaymentGateways;

class StripePayment implements PaymentGateways
{
    public function pay(float $amount)
    {
        return "Paid $amount using stripe";
    }
}
