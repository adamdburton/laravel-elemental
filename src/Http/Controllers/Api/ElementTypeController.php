<?php

namespace Click\Elemental\Http\Controllers\Api;

use Click\Elements\Elements\ElementType;
use Illuminate\Http\Request;

class ElementTypeController
{
    public function index(Request $request)
    {
        return ElementType::all();
    }
}
