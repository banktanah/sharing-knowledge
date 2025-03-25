<?php

namespace App\Providers;

use App\Models\SiteAcknowledge;
use App\Observers\SiteAcknowledgeObserver;
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
        SiteAcknowledge::observe(SiteAcknowledgeObserver::class);
    }
}
