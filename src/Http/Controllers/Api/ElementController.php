<?php

namespace Click\Elemental\Http\Controllers\Api;

use Click\Elemental\Http\Resources\ElementResource;
use Click\Elements\Elements;
use Click\Elements\Exceptions\Element\ElementNotInstalledException;
use Click\Elements\Exceptions\Element\ElementNotRegisteredException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ElementController
{
    /**
     * @var Elements
     */
    protected $elements;

    public function __construct(Elements $elements)
    {
        $this->elements = $elements;
    }

    /**
     * @param Request $request
     * @param string $type
     * @return AnonymousResourceCollection
     * @throws ElementNotRegisteredException
     */
    public function index(Request $request, string $type)
    {
        $elements = $this->elements->getElementDefinition($type)->factory()->all();

        return ElementResource::collection($elements);
    }

    /**
     * @param Request $request
     * @param string $type
     * @param int $id
     * @return mixed
     * @throws ElementNotRegisteredException
     */
    public function show(Request $request, string $type, int $id)
    {
        $element = $this->elements->getElementDefinition($type)->factory()->find($id);

        return new ElementResource($element);
    }
}
