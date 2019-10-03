<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->app['view']->addNamespace('hiraloa', base_path() . '/resources/themes/hiraloa/views');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


    }
}
