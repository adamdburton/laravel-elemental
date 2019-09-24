<?php

namespace Click\Elemental;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ElementalServiceProvider extends ServiceProvider
{
    protected $controllerNamespace = 'Click\\Elemental\\Http\\Controllers';

    /**
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'elemental');

        $this->registerViews();
        $this->registerRoutes();

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

        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('vendor/click/elemental'),
        ]);
    }

    /**
     * Registers views
     */
    protected function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'elemental');
    }

    /**
     * Registers routes.
     */
    protected function registerRoutes()
    {
        $prefix = config('elemental.prefix');

        $this->registerApiRoutes($prefix);
        $this->registerWebRoutes($prefix);
    }

    /**
     * Registers api routes.
     * @param $prefix
     */
    protected function registerApiRoutes($prefix)
    {
        Route::prefix($prefix)
            ->as('elemental.')
//            ->middleware('api')
            ->namespace($this->controllerNamespace)
            ->group(elemental_path('routes/api.php'));
    }

    /**
     * Registers web routes.
     *
     * @param $prefix
     */
    protected function registerWebRoutes($prefix)
    {
        Route::prefix($prefix)
            ->as('elemental.')
//            ->middleware('web')
            ->namespace($this->controllerNamespace)
            ->group(elemental_path('routes/web.php'));
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
}
