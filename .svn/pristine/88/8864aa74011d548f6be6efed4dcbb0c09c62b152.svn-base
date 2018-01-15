<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/20/2017
 * Time: 12:32 PM
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
    protected function registerMiddleware()
    {
        $router = $this->app['router'];

        $router->aliasMiddleware('admin.guest', RedirectIfAdminAuth::class);
    }
}