<?php

namespace Click\Elemental\Http\Resources;

use Click\Elements\Element;
use Click\Elements\Exceptions\ElementNotRegisteredException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ElementResource extends JsonResource
{
    /**
     * @var Element
     */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     * @throws ElementNotRegisteredException
     */
    public function toArray($request)
    {
        return $request->get('properties') ? $this->withProperties() : $this->withoutProperties();
    }

    /**
     * @return array
     * @throws ElementNotRegisteredException
     */
    protected function withProperties()
    {
        return $this->resource->toJson();
    }

    /**
     * @return array
     * @throws ElementNotRegisteredException
     */
    protected function withoutProperties()
    {
        $json = $this->resource->toJson();

        unset($json['properties']);

        return $json;
    }
}
