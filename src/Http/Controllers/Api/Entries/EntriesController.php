<?php

namespace Click\Elemental\Http\Controllers\Api\Entries;

use Click\Elemental\Http\Controllers\Controller;
use Click\Elemental\Http\Resources\ElementResource;

class EntriesController extends Controller
{
    public function index()
    {
        $entries = $this->elemental->entries();

        return ElementResource::collection($entries);
    }
}
