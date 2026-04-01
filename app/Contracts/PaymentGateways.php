<?php

namespace App\Contracts;

interface PaymentGateways
{
    public function pay(float $amount);
}
