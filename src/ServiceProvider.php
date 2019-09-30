<?php

namespace Click\Elemental;

use Click\Elemental\Contracts\ModuleContract;
use Click\Elements\Facades\Elements;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Str;
use ReflectionClass;

abstract class ServiceProvider extends BaseServiceProvider implements ModuleContract
{
    protected $routeNamespace;
    protected $controllerNamespace;

    protected $commands = [];

    public function boot()
    {
        $this->mapRoutes();
        $this->registerElements();

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
        $namespace = $this->getControllerNamespace();
        $prefix = sprintf('%s/%s', config('elemental.prefix'), $namespace);

        $path = package_path('routes/api.php');

        if (file_exists($path)) {
            Route::prefix($prefix)
                ->as('elemental.api.' . $this->getRouteNamespace() . '.')
                ->namespace($this->controllerNamespace)
                ->group($path);
        }
    }

    protected function publishes(array $paths, $groups = null)
    {
        parent::publishes($paths, 'elemental.assets' . ($groups ? '.' . $groups : ''));
    }

    protected function getRouteNamespace()
    {
        return $this->routeNamespace ?: strtolower(Str::camel($this->getName()));
    }

    protected function getControllerNamespace()
    {
        return $this->controllerNamespace ?: $this->getPackageNamespace('Http\\Controllers\\Api');
    }
    
    protected function getPackageNamespace($append)
    {
        return (new ReflectionClass(get_class($this)))->getNamespaceName() .
            ($append ? '\\' . ltrim($append, '\\') : '');
    }

    protected function registerElements()
    {
        $elements = Arr::wrap(func_get_args());

        collect($elements)->each(function (string $element) {
            Elements::register($element);
        });
    }
}