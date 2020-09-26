<?php

namespace Click\Elemental\Http\Controllers\Api\Entries;

use Click\Elemental\Http\Controllers\Controller;
use Click\Elemental\Http\Resources\ElementResource;
use Illuminate\Support\Facades\Request;

class SectionsController extends Controller
{
    public function index()
    {
        $sections = $this->elemental->sections();

        return ElementResource::collection($sections);
    }

    public function store(Request $request)
    {
        dd($request->all());

        $section = $this->elemental->sections()->create($request->all());
    }
}
