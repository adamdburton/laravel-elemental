<?php

namespace Click\Elemental;

use Click\Elemental\Services\ElementService;
use Click\Elemental\Services\PropertyService;
use Illuminate\View\View;

class Elemental
{
    /** @var ElementService */
    protected $elementService;

    /** @var PropertyService */
    private $propertyService;

    public function __construct(ElementService $elementService, PropertyService $propertyService)
    {
        $this->elementService = $elementService;
        $this->propertyService = $propertyService;
    }

    /**
     * @return ElementService
     */
    public function elements()
    {
        return $this->elementService;
    }

    /**
     * @return PropertyService
     */
    public function properties()
    {
        return $this->propertyService;
    }
}
