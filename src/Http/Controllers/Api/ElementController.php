<?php

namespace Click\Elemental\Http\Controllers\Api;

use Click\Elemental\Http\Resources\ElementResource;
use Click\Elemental\Services\ElementService;
use Illuminate\Http\Request;

class ElementController
{
    /** @var ElementService */
    protected $service;

    public function __construct(ElementService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = $this->service->query();

        foreach($request->all() as $key => $value) {
            $query->property($key, $value);
        }

        return ElementResource::collection($query->get());
    }
}
