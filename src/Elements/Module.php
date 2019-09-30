<?php

namespace Click\Elemental\Elements;

use Click\Elements\Element;
use Click\Elements\Schemas\ElementSchema;

class Module extends Element
{
    /**
     * Define the schema for the FieldGroup element.
     *
     * @param ElementSchema $schema
     * @return void
     */
    public function getDefinition(ElementSchema $schema)
    {
        $schema->string('name');
        $schema->string('description');
        $schema->string('author');
    }
}
