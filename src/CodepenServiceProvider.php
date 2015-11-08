<?php

namespace Unicodeveloper\Codepen;

use Illuminate\Support\ServiceProvider;

class CodepenServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Publishes all the config file this package needs to function
     * @return void
     */
    public function boot()
    {
        $config = realpath(__DIR__.'/../resources/config/codepen.php');

        $this->publishes([
            $config => config_path('codepen.php')
        ]);
    }

    /**
     * Register the application services
     * @return void
     */
    public function register()
    {
        $this->app->bind('laravel-codepen', function(){

            return new CodepenManager;

        });
    }

    /**
     * Get the services provided by the provider
     * @return array
     */
    public function provides()
    {
        return ['laravel-codepen'];
    }
}