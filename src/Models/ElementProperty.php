<?php

namespace Click\Elemental\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ElementProperty extends Pivot
{
    public $incrementing = true;

    protected $table = 'element_properties';

    public function element()
    {
        return $this->belongsTo(Element::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
