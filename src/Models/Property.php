<?php

namespace Click\Elemental\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['property', 'type'];

    public function elements()
    {
        return $this->belongsToMany(Element::class, 'element_properties')
            ->using(ElementProperty::class)
            ->withPivot('bool_value', 'int_value', 'float_value', 'string_value', 'text_value', 'json_value');
    }
}
