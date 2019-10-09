<?php

namespace Click\Elemental;

use Click\Elemental\Contracts\ModuleContract;
use Click\Elements\Elements;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionException;

abstract class ServiceProvider extends BaseServiceProvider implements ModuleContract
{
    protected $routeNamespace;
    protected $controllerNamespace;

    protected $commands = [];

    /**
     * @throws ReflectionException
     */
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

    /**
     * @throws ReflectionException
     */
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

    /**
     * @param array $paths
     * @param null $groups
     */
    protected function publishes(array $paths, $groups = null)
    {
        parent::publishes($paths, 'elemental.assets' . ($groups ? '.' . $groups : ''));
    }

    /**
     * @return string
     */
    protected function getRouteNamespace()
    {
        return $this->routeNamespace ?: strtolower(Str::kebab($this->getName()));
    }

    /**
     * @return string
     * @throws ReflectionException
     */
    protected function getControllerNamespace()
    {
        return $this->controllerNamespace ?: $this->getPackageNamespace('Http\\Controllers\\Api');
    }

    /**
     * @param $append
     * @return string
     * @throws ReflectionException
     */
    protected function getPackageNamespace($append)
    {
        return (new ReflectionClass(get_class($this)))->getNamespaceName() .
            ($append ? '\\' . ltrim($append, '\\') : '');
    }

    protected function registerElements()
    {
        $elementClasses = Arr::wrap($this->getElements());

        $this->app->afterResolving(Elements::class, function (Elements $elements) use ($elementClasses) {
            foreach ($elementClasses as $element) {
                $elements->register($element)->install();
            }
        });
    }
}