<?php

namespace App\Providers;

use App\Models\ClientType;
use App\Models\Invoice;
use App\Models\PaymentTerm;
use App\Observers\ClientTypeObserver;
use App\Observers\InvoiceObserver;
use App\Observers\PaymentTermObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        PaymentTerm::observe(PaymentTermObserver::class);
        Invoice::observe(InvoiceObserver::class);

    }
}
