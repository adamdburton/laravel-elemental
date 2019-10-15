<?php

namespace Click\Elemental\Elements\Structures;

use Click\Elements\Element;
use Click\Elements\Exceptions\Property\PropertyAlreadyDefinedException;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Schemas\ElementSchema;

class Structure extends Element
{
    /**
     * @param ElementSchema $schema
     * @return void
     * @throws PropertyKeyInvalidException
     * @throws PropertyAlreadyDefinedException
     */
    public function getDefinition(ElementSchema $schema)
    {
        $schema->unsignedInteger('maxLevels');
    }
}
