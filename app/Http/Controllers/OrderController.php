<?php

namespace App\Http\Controllers;

use App\Contracts\Notifier;

class OrderController extends Controller
{
    public function __construct(protected Notifier $notifier) {}

    public function store()
    {
        $this->notifier->send("Order Created");

        return "Done";
    }
}
