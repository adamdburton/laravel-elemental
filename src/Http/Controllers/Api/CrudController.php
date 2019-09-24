<?php

namespace Click\Elemental\Http\Controllers\Api;

use Click\Elemental\Http\Resources\ElementResource;
use Click\Elements\Models\Entity;
use Click\Elements\Services\ElementService;
use Illuminate\Http\Request;

class CrudController
{
    /** @var ElementService */
    protected $service;

    public function __construct()
    {
//        $this->service = $service;
    }

    public function index(Request $request)
    {

    }
}
