<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/22/2017
 * Time: 6:22 PM
 */

namespace App\Image;

use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerImageService();

        $this->app->alias('image', 'App\Image\Service');
    }
    /**
     * Register the Image Service instance.
     */
    protected function registerImageService()
    {
        $this->app->singleton('image', function ($app) {
            return new Service();
        });
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides()
    {
        return ['image', 'App\Image\Service'];
    }
}