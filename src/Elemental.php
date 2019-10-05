<?php

namespace Click\Elemental;

use Click\Elemental\Http\Resources\PropertyResource;
use Click\Elements\Facades\Elements;

class Elemental
{
    protected $modules = [];

    public function __construct()
    {

    }

    public function registerModule(ServiceProvider $module)
    {
        $this->modules[$module->getAlias()] = $module;
    }
}
