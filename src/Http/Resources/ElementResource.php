<?php

namespace Click\Elemental\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ElementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $type =
        $properties = ElementPropertyResource::collection($this->properties);

        $properties = $properties->mapWithKeys(function($property){dd($property);
            $type = $property->type . '_value';
            $property = str_replace('_', '', $property->property);
            return [$property => $property->pivot->$type];
        });

        dd($properties);

        $baseProperties = [
            'uuid' => $this->uuid
        ];

        $dateProperties = [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];

        return array_merge($baseProperties, $properties->all(), $dateProperties);
    }
}
