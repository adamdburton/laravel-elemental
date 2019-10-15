<?php

namespace Click\Elemental\Elements\Assets;

use Click\Elements\Element;
use Click\Elements\Exceptions\Property\PropertyAlreadyDefinedException;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Schemas\ElementSchema;

class Volume extends Element
{
    /**
     * @param ElementSchema $schema
     * @return void
     * @throws PropertyAlreadyDefinedException
     * @throws PropertyKeyInvalidException
     */
    public function getDefinition(ElementSchema $schema)
    {
        $schema->string('name');
        $schema->string('handle');
        $schema->string('type');
        $schema->string('url');
        $schema->json('settings');
        $schema->unsignedInteger('sortOrder');
    }
}
