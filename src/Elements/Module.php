<?php

namespace Click\Elemental\Elements;

use Click\Elements\Element;
use Click\Elements\Exceptions\Property\PropertyAlreadyDefinedException;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Schemas\ElementSchema;

class Module extends Element
{
    /**
     * Define the schema for the FieldGroup element.
     *
     * @param ElementSchema $schema
     * @return void
     * @throws PropertyAlreadyDefinedException
     * @throws \Click\Elements\Exceptions\Property\PropertyKeyInvalidException
     */
    public function getDefinition(ElementSchema $schema)
    {
        $schema->string('name')->label('Name');
        $schema->string('description')->label('Description');
        $schema->string('author')->label('Author');
    }
}

Module::create([
    'name' => 'ewfwe'
]);

Module::create([
    'name' => 'ewfwe'
]);