<?php

namespace Click\Elemental\Models;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    public function properties()
    {
        return $this->belongsToMany(Property::class, 'element_properties')
            ->using(ElementProperty::class)
            ->withPivot('bool_value', 'int_value', 'float_value', 'string_value', 'text_value', 'json_value');
    }
}
