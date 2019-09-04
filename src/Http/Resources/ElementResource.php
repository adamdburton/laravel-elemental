<?php

namespace Click\Elemental\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ElementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $properties = ElementPropertyResource::collection($this->properties);

        $baseProperties = [
            'uuid' => $this->uuid
        ];

        $dateProperties = [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];

        return array_merge($baseProperties, $properties, $dateProperties);
    }
}
