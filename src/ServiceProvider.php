<?php

namespace Click\Elemental;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Str;

abstract class ServiceProvider extends BaseServiceProvider
{
    protected $namespace;
    protected $controllerNamespace;

    protected $commands = [];

    abstract function getName();

    abstract function getDescription();

    public function boot()
    {
        $this->mapRoutes();

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    protected function bootForConsole()
    {
        $this->commands($this->commands);
    }

    protected function mapRoutes()
    {
        $namespace = $this->getNamespace();
        $prefix = sprintf('%s/%s', config('elemental.prefix'), $namespace);

        $path = package_path('routes/api.php');

        if (file_exists($path)) {
            Route::prefix($prefix)
                ->as('elemental.' . $this->getNamespace() . '.')
                ->namespace($this->controllerNamespace)
                ->group($path);
        }
    }

    protected function publishes(array $paths, $groups = null)
    {
        parent::publishes($paths, 'elemental.assets' . ($groups ? '.' . $groups : ''));
    }

    protected function getNamespace()
    {
        return $this->namespace ?: strtolower(Str::kebab($this->getName()));
    }
}