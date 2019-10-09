<?php


namespace Mehran\UploadMe\Providers;

use Illuminate\Support\ServiceProvider;
/**
* UploadMe service provider
*
* @author    Mehran Marandi <mehranmarandi90@gmail.com>
* @copyright Null
*/

class UploadMeServiceProvider extends ServiceProvider
{
/**
* Bootstrap services.
*
* @return void
*/
public function boot()
{
    include __DIR__ . '/../Http/routes.php';
    $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'UploadMe');
    $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'UploadMe');
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