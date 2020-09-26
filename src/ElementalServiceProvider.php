<?php

namespace Click\Elemental;

use Click\Elemental\Auth\ElementalGuard;
use Click\Elemental\Auth\ElementalUserProvider;
use Click\Elemental\Elements\Entries\Section;
use Click\Elemental\Elements\Modules\Module;
use Click\Elemental\Elements\Users\User;
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
        $this->registerAppRoutes();
        $this->registerApiRoutes();
        $this->registerWebRoutes();
    }

    /**
     * Registers app routes.
     */
    protected function registerAppRoutes()
    {
        $prefix = config('elemental.prefix');

        Route::prefix($prefix)
            ->as('elemental.app.')
//            ->middleware('auth:elemental')
            ->namespace($this->controllerNamespace)
            ->group(elemental_path('routes/app.php'));
    }

    /**
     * Registers api routes.
     */
    protected function registerApiRoutes()
    {
        $prefix = config('elemental.prefix');

        Route::prefix($prefix . '/api')
            ->as('elemental.api.')
//            ->middleware('auth:elemental')
            ->namespace($this->controllerNamespace)
            ->group(elemental_path('routes/api.php'));
    }

    /**
     * Registers web routes.
     *
     */
    protected function registerWebRoutes()
    {
        $prefix = config('elemental.prefix');

        Route::as('elemental.')
//            ->middleware('auth:elemental')
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
