<?php

namespace Click\Elemental\Services;

use Click\Elemental\Exceptions\PropertyAlreadyExistsException;
use Click\Elemental\Exceptions\PropertyMissingException;
use Click\Elemental\Exceptions\PropertyTypeInvalidException;
use Click\Elemental\Models\Property;

class PropertyService
{
    const PROPERTY_TYPE_BOOL = 'bool';
    const PROPERTY_TYPE_INT = 'int';
    const PROPERTY_TYPE_FLOAT = 'float';
    const PROPERTY_TYPE_STRING = 'string';
    const PROPERTY_TYPE_TEXT = 'text';
    const PROPERTY_TYPE_JSON = 'json';

    /** @var array */
    protected $properties;

    /**
     * @return array
     */
    public function getProperties()
    {
        if(!$this->properties) {
            $this->properties = Property::all()->keyBy('property')->all();
        }

        return $this->properties;
    }

    /**
     * @param $key
     * @return mixed
     * @throws PropertyMissingException
     */
    public function getProperty($key)
    {
        $this->getProperties();

        if (!isset($this->properties[$key])) {
            throw new PropertyMissingException($key);
        }

        return $this->properties[$key];
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        return [
            self::PROPERTY_TYPE_BOOL,
            self::PROPERTY_TYPE_INT,
            self::PROPERTY_TYPE_FLOAT,
            self::PROPERTY_TYPE_STRING,
            self::PROPERTY_TYPE_TEXT,
            self::PROPERTY_TYPE_JSON
        ];
    }

    /**
     * @param $name
     * @param $type
     * @return mixed
     * @throws PropertyAlreadyExistsException
     * @throws PropertyTypeInvalidException
     */
    public function createProperty($name, $type)
    {
        if(Property::where('property', $name)->exists()) {
            throw new PropertyAlreadyExistsException($name);
        }

        if(!in_array($type, $this->getTypes())) {
            throw new PropertyTypeInvalidException($type);
        }

        return Property::create([
            'property' => $name,
            'type' => $type
        ]);
    }
}
