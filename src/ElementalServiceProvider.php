<?php

namespace Click\Elemental;

use Click\Elemental\Auth\ElementalGuard;
use Click\Elemental\Auth\ElementalUserProvider;
use Click\Elemental\Elements\Module;
use Click\Elemental\Elements\User;
use Illuminate\Support\Facades\Auth;
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

        $this->registerGuard();
        $this->registerViews();
        $this->registerRoutes();
        $this->registerElements();

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
            __DIR__ . '/../resources/public' => public_path('vendor/click/elemental'),
        ]);
    }

    protected function registerElements()
    {
        return [
            User::class,
            Module::class
        ];
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
            ->middleware('auth:elemental')
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
            ->middleware('auth:elemental')
            ->namespace($this->controllerNamespace)
            ->group(elemental_path('routes/web.php'));
    }

    protected function registerGuard()
    {
        Auth::provider('elemental', function ($app, array $config) {
            return new ElementalUserProvider();
        });

        Auth::extend('elemental', function ($app, $name, array $config) {
            return new ElementalGuard(Auth::createUserProvider($config['provider']));
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/elemental.php', 'elemental');

        $this->mergeGuardConfig();

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

    protected function mergeGuardConfig()
    {
        $this->app['config']->set('auth.guards.elemental', [
            'driver' => 'elemental',
            'provider' => 'elemental',
        ]);

        $this->app['config']->set('auth.providers.elemental', [
            'driver' => 'elemental'
        ]);

        $this->app['config']->set('auth.passwords.elemental', [
            'provider' => 'elemental'
        ]);
    }
}
