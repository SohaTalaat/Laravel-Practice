<?php

use App\Contracts\Notifier;
use App\Contracts\PaymentGateways;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/order', [OrderController::class, 'store']);

// Method Injection (Without controller)

Route::get('/test', function (Notifier $notifier) {
    $notifier->send("Hello from route");
    return "send";
});   // Laravel resolves without binding

Route::get('/pay', function (Request $request, PaymentGateways $payment) {
    return $payment->pay(100);
});
