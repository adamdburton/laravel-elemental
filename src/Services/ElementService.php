<?php

namespace Click\Elemental\Services;

use Click\Elemental\Exceptions\PropertyMissingException;
use Click\Elemental\Models\Element;
use Click\Elemental\Models\Property;
use Click\Elemental\Query;

class ElementService
{
    /** @var array */
    protected $properties;

    public function getById($id)
    {
        return Element::with('properties')->find($id);
    }

    public function getByUuid($uuid)
    {
        return Element::with('properties')->where('uuid', $uuid)->first();
    }

    public function getProperties()
    {
        return Property::all()->keyBy('property')->all();
    }

    /**
     * @param $key
     * @return mixed
     * @throws PropertyMissingException
     */
    public function getProperty($key)
    {
        if (!$this->properties) {
            $this->properties = $this->getProperties();
        }

        if (!isset($this->properties[$key])) {
            throw new PropertyMissingException($key);
        }

        return $this->properties[$key];
    }

    /**
     * @return Query
     */
    public function newQuery()
    {
        return (new Query)
            ->setQuery(Element::with('properties'));
    }

    public function detect()
    {

    }

    public function registerElement(Element $element)
    {

    }
}
