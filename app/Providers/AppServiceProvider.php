<?php

namespace App\Providers;

use App\Contracts\Notifier;
use App\Contracts\PaymentGateways;
use App\Http\Controllers\OrderController;
use App\Services\SalesReport;
use App\Services\EmailNotifier;
use App\Services\SmsNotifier;
use App\Services\StripePayment;
use App\Services\UserReport;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        // Interface
        $this->app->bind(EmailNotifier::class, SmsNotifier::class);

        //Contextual binding
        $this->app->when(OrderController::class)
            ->needs(Notifier::class)
            ->give(SmsNotifier::class);

        /*$this->app->when(AdminController::class)  // As if there is an Admin Controller
            ->needs(Notifier::class)
            ->give(EmailNotifier::class); */

        //Tagging
        $this->app->bind(EmailNotifier::class);
        $this->app->bind(SmsNotifier::class);

        $this->app->tag([EmailNotifier::class, SmsNotifier::class], 'notifiers');

        // Payment binding
        $this->app->bind(PaymentGateways::class, StripePayment::class);

        // Report Tag binding
        $this->app->bind(SalesReport::class);
        $this->app->bind(UserReport::class);

        $this->app->tag([SalesReport::class, UserReport::class], 'reports');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
