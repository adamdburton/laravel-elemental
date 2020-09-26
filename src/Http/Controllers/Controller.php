<?php

namespace Click\Elemental\Http\Controllers;

use Click\Elemental\Elemental;

abstract class Controller
{
    /**
     * @var Elemental
     */
    protected $elemental;

    public function __construct(Elemental $elemental)
    {
        $this->elemental = $elemental;
    }
}
