<?php

namespace Click\Elemental\Http\Controllers\Api;

use Click\Elemental\Http\Requests\Api\ElementRequest;

class ElementController
{
    public function index(ElementRequest $request)
    {
        return Element::get();
    }

    public function show(Request $request, string $type)
    {
        return Element::findOrFail();
    }
}
