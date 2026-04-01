<?php

namespace App\Providers;

use App\Contracts\Notifier;
use App\Http\Controllers\OrderController;
use App\Services\EmailNotifier;
use App\Services\SmsNotifier;
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

        //Tagging
        $this->app->bind(EmailNotifier::class);
        $this->app->bind(SmsNotifier::class);

        $this->app->tag([EmailNotifier::class, SmsNotifier::class], 'notifiers');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
