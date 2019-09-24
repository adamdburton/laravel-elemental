<?php

namespace Click\Elemental\Http\Controllers\Api;

use Click\Elemental\Http\Resources\PropertyResource;
use Click\Elements\Services\PropertyService;

class PropertyController
{
    /** @var PropertyService */
    protected $service;

    public function __construct()
    {
//        $this->service = $service;
    }

    public function index()
    {
        return Elemental::properties();
    }
}
