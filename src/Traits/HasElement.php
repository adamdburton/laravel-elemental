<?php

namespace Click\Elemental\Traits;

use Click\Elemental\Models\Element;

trait HasElement
{
    public function element()
    {
        return $this->morphOne(Element::class, 'element');
    }
}
