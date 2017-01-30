<?php

namespace Eugenevdm\Feature;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class NetworkServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Network', function ($app) {

            return true;
        });

    }

    /**
     * Publish the plugin configuration.
     */
    public function boot()
    {

        AliasLoader::getInstance()->alias(
            'Network',
            'Eugenevdm\Network\NetworkFacade'
        );
    }

}
