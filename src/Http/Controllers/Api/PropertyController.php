<?php

namespace Click\Elemental\Http\Controllers\Api;

use Click\Elemental\Http\Resources\PropertyResource;
use Click\Elemental\Services\PropertyService;

class PropertyController
{
    /** @var PropertyService */
    protected $service;

    public function __construct(PropertyService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return PropertyResource::collection($this->service->getProperties());
    }
}
