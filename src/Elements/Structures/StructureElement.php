<?php

namespace Click\Elemental\Elements\Structures;

use Click\Elements\Element;
use Click\Elements\Exceptions\Property\PropertyAlreadyDefinedException;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Exceptions\Relation\RelationTypeNotValidException;
use Click\Elements\Schemas\ElementSchema;
use Click\Elements\Types\RelationType;

class StructureElement extends Element
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
        $schema->relation('structure', Structure::class, RelationType::SINGLE);
        $schema->relation('element', StructureElement::class, RelationType::SINGLE);
        $schema->unsignedInteger('root');
        $schema->unsignedInteger('lft');
        $schema->unsignedInteger('rgt');
        $schema->unsignedInteger('level');
    }
}
