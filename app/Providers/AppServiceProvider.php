<?php

namespace Lej\Providers;

use Lej\Support\Asset;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     * @throws
     */
    public function boot()
    {
        $this->addAssets();
    }

    /**
     * Register any application services.
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

    /**
     * Add assets
     * @throws
     */
    protected function addAssets()
    {
        if (request()->ajax())
            return;
        $asset = app()->make(Asset::class);

        $asset->addJs('ext-all', 'assets/vendor/extjs/ext-all.js');

        $asset->addCss('theme-classic', 'assets/theme/css/theme-classic.css');
        $asset->addCss('theme-app', 'assets/theme/css/app.css', true);
        $asset->addJs('theme-classic', 'assets/theme/js/theme-classic.js');
        $asset->addJs('theme-app', 'assets/theme/js/app.js', true);
    }
}
