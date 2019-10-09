<?php


namespace Mehran\PayMe\Providers;

use Illuminate\Support\ServiceProvider;
/**
* PayMe service provider
*
* @author    Mehran Marandi <mehranmarandi90@gmail.com>
* @copyright Null
*/

class PayMeServiceProvider extends ServiceProvider
{
/**
* Bootstrap services.
*
* @return void
*/
public function boot()
{
    include __DIR__ . '/../Http/routes.php';
    $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'PayMe');
    $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'PayMe');
    $this->loadMigrationsFrom(__DIR__ .'/../Database/Migrations');

}

/**
* Register services.
*
* @return void
*/
public function register()
{
    $this->mergeConfigFrom(
        dirname(__DIR__) . '/Config/menu.php', 'menu.admin'
    );
}
}