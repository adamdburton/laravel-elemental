<?php

namespace Click\Elemental;

use Click\Elemental\Exceptions\PropertyMissingException;
use Click\Elemental\Services\ElementService;
use Click\Elemental\Services\PropertyService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Query
{
    /** @var ElementService */
    protected $elements;

    /** @var PropertyService */
    protected $properties;

    /** @var Builder */
    protected $query;

    /**
     * @param Builder $query
     * @return Query
     */
    public function setQuery(Builder $query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * @return Builder
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param $property
     * @param string $operator
     * @param null $value
     * @return $this
     * @throws PropertyMissingException
     */
    public function whereProperty($property, $operator = '=', $value = null)
    {
        $prop = \Elemental::properties()->getProperty($property);

        $this->query->whereHas('properties', function ($query) use ($prop, $operator, $value) {
           $query
               ->where('property_id', $prop->id)
               ->where($prop->type . '_value', $value ? $operator : '=', $value ?? $operator);
        });

        return $this;
    }

    /**
     * @return Builder[]|Collection
     */
    public function get()
    {
        return $this->query->get();
    }
}
