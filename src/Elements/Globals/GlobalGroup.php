<?php

namespace Click\Elemental\Elements\Globals;

use Click\Elemental\Auth\BaseUser as Element;
use Click\Elemental\Elements\Fields\Layout;
use Click\Elements\Exceptions\Property\PropertyAlreadyDefinedException;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Exceptions\Relation\RelationTypeNotValidException;
use Click\Elements\Schemas\ElementSchema;
use Click\Elements\Types\RelationType;

class GlobalGroup extends Element
{
    /**
     * @param ElementSchema $schema
     * @return void
     * @throws PropertyKeyInvalidException
     * @throws PropertyAlreadyDefinedException
     * @throws RelationTypeNotValidException
     */
    public function getDefinition(ElementSchema $schema)
    {
        $schema->string('name');
        $schema->string('handle');
        $schema->relation('fieldLayout', Layout::class, RelationType::SINGLE);
    }
}