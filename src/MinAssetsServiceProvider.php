<?php

namespace DenisKisel\MinAssets;

use DenisKisel\MinAssets\Commands\makeMinAssets;
use Illuminate\Support\ServiceProvider;

class MinAssetsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'deniskisel');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'deniskisel');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/min_assets.php', 'min_assets');

        // Register the service the package provides.
        $this->app->singleton('minassets', function ($app) {
            return new MinAssets;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['minassets'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/min_assets.php' => config_path('min_assets.php'),
        ], 'min_assets.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/deniskisel'),
        ], 'minassets.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/deniskisel'),
        ], 'minassets.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/deniskisel'),
        ], 'minassets.views');*/

        // Registering package commands.
         $this->commands([MakeMinAssets::class]);
    }
}
