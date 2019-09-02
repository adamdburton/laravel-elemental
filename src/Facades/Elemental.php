<?php

namespace Click\Elemental\Facades;

use Illuminate\Support\Facades\Facade;

class Elemental extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'elemental';
    }
}
