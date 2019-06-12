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

        $asset->addCss('nprogress', 'assets/vendor/nprogress/nprogress.min.css');
        $asset->addJs('nprogress', 'assets/vendor/nprogress/nprogress.min.js', true);

        $asset->addJs('jquery', 'assets/vendor/jquery/jquery-3.4.1.min.js');
        $asset->addJs('ext-all', 'assets/vendor/extjs/ext-all.js');

        $asset->addCss('theme-classic', 'assets/themes/neptune/theme-neptune-min.css');
        $asset->addJs('theme-classic', 'assets/themes/neptune/theme-neptune-min.js');

        $asset->addCss('main-app', 'assets/app/css/app.css', true);
        $asset->addJs('main-app', 'assets/app/js/app.js', true);
    }
}
