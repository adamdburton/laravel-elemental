<?php

namespace Click\Elemental;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class ElementalServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'elemental');

        $prefix = $this->app['config']->get('elemental.prefix');

        $this->registerViews();
        $this->registerRoutes($prefix);

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        $this->publishes([
            __DIR__ . '/../config/elemental.php' => config_path('elemental.php'),
        ], 'elemental.config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/elemental.php', 'elemental');

        $this->app->singleton('elemental', function ($app) {
            return $app->make(Elemental::class);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['elemental'];
    }

    /**
     * Registers views
     */
    protected function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'elemental');
    }

    /**
     * Registers routes
     */
    protected function registerRoutes($prefix)
    {
        $this->getRouter()->group([
            'namespace' => 'Click\\Elemental\\Http\\Controllers',
            'prefix' => $prefix
        ], function (Router $router) use ($prefix) {
            $this->getRouter()->group([
                'prefix' => 'api',
                'as' => 'elemental.api.'
            ], function(Router $router) {
                $router->resource('element', 'Api\\ElementController');
            });

            $router->get('{any?}')
                ->uses('AppController')
                ->name('elemental.app')
                ->where('any', '.*');
        });
    }

    /**
     * Get the active router.
     *
     * @return Router
     */
    protected function getRouter()
    {
        return $this->app['router'];
    }
}
