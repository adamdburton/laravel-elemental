<?php

namespace Click\Elemental\Http\Controllers\Api;

use Click\Elemental\Http\Requests\Api\ElementQueryRequest;
use Click\Elemental\Http\Resources\ElementResource;
use Click\Elements\Contracts\ElementContract;
use Click\Elements\Elements;
use Click\Elements\Exceptions\ElementNotInstalledException;
use Click\Elements\Exceptions\ElementNotRegisteredException;
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
     * @param ElementQueryRequest $request
     * @param string $type
     * @return AnonymousResourceCollection
     * @throws ElementNotInstalledException
     * @throws ElementNotRegisteredException
     */
    public function index(ElementQueryRequest $request, string $type)
    {
        $elements = $this->elements->factory($type)->all();

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
        $element = $this->elements->factory($type)->find($id);

        return new ElementResource($element);
    }
}
