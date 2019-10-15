<?php

namespace Click\Elemental\Elements\Modules;

use Click\Elements\Element;
use Click\Elements\Exceptions\Property\PropertyAlreadyDefinedException;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Schemas\ElementSchema;

class Module extends Element
{
    /**
     * @param ElementSchema $schema
     * @return void
     * @throws PropertyKeyInvalidException
     * @throws PropertyAlreadyDefinedException
     */
    public function getDefinition(ElementSchema $schema)
    {
        $schema->string('name')->label('Name');
        $schema->string('description')->label('Description');
        $schema->string('author')->label('Author');
    }
}
