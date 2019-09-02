<?php

namespace Click\Elemental\Tests;

use Click\Elemental\ElementalServiceProvider;
use Click\Elemental\Facades\Elemental;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Load package service provider
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [ElementalServiceProvider::class];
    }

    /**
     * Load package alias
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Elemental' => Elemental::class,
        ];
    }

    protected function assertRouteExists($route)
    {
        $this->assertTrue(\Route::has($route), 'Route \'' . $route . '\' does not exist');
    }
}
