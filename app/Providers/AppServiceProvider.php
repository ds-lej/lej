<?php

namespace Ds\Providers;

use Ds\Support\Asset;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        # Assets
        # =========
        $this->app->singleton(Asset::class, function ($app) {
            return new Asset();
        });
    }
}
