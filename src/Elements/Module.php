<?php

namespace Click\Elemental\Elements;

use Click\Elements\Element;
use Click\Elements\Exceptions\PropertyKeyInvalidException;
use Click\Elements\Schemas\ElementSchema;

class Module extends Element
{
    /**
     * Define the schema for the FieldGroup element.
     *
     * @param ElementSchema $schema
     * @return void
     * @throws PropertyKeyInvalidException
     */
    public function getDefinition(ElementSchema $schema)
    {
        $schema->string('name')->label('Name');
        $schema->string('description')->label('Description');
        $schema->string('author')->label('Author');
    }
}
