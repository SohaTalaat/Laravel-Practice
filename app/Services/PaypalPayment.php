<?php

namespace App\Services;

use App\Contracts\PaymentGateways;

class PaypalPayment implements PaymentGateways
{
    public function pay(float $amount)
    {
        return "Paid $amount using paypal";
    }
}
