<?php

use App\Contracts\Notifier;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/order', [OrderController::class, 'store']);

// Method Injection (Without controller)

Route::get('/test', function (Notifier $notifier) {
    $notifier->send("Hello from route");
    return "send";
});   // Laravel resolves without binding
