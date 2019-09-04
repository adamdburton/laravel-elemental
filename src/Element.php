<?php

namespace Click\Elemental;

use Illuminate\Support\Str;

class Element
{
    /** @var array */
    protected $attributes = [];

    /** @var array */
    protected $properties = [];

    /** @var string */
    protected $elementName = null;

    public function __construct($attributes = null)
    {

    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->elementName ?? Str::snake(Str::pluralStudly(class_basename($this)));
    }

    /**
     * @return Query
     */
    public function query()
    {
        return element($this->getSlug());
    }
}