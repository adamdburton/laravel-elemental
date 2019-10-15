<?php

namespace Click\Elemental\Elements\Fields;

use Click\Elemental\Auth\BaseUser as Element;
use Click\Elements\Exceptions\Property\PropertyAlreadyDefinedException;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Exceptions\Relation\RelationTypeNotValidException;
use Click\Elements\Schemas\ElementSchema;
use Click\Elements\Types\RelationType;

class Field extends Element
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
        $schema->string('instructions');
        $schema->string('type');
        $schema->string('settings');
        $schema->relation('group', LayoutGroup::class, RelationType::SINGLE);
    }
}