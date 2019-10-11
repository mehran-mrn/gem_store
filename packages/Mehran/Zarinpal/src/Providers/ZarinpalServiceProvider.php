<?php

namespace Mehran\Zarinpal\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class ZarinpalServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        include __DIR__ . '/../Http/routes.php';

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'Zarinpal');
    }
}
