<?php

namespace Click\Elemental\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ElementPropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $fieldType = $this->type . '_value';

        return [
            'property' => $this->property,
            'value' => $this->pivot->$fieldType
        ];
    }
}
