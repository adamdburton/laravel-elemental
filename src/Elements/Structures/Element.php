<?php

namespace Click\Elemental\Elements\Structures;

use Click\Elements\Element as BaseElement;
use Click\Elements\Exceptions\Property\PropertyAlreadyDefinedException;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Exceptions\Relation\RelationTypeNotValidException;
use Click\Elements\Schemas\ElementSchema;
use Click\Elements\Types\RelationType;

class Element extends BaseElement
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
        $schema->relation('element', Element::class, RelationType::SINGLE);
        $schema->unsignedInteger('root');
        $schema->unsignedInteger('lft');
        $schema->unsignedInteger('rgt');
        $schema->unsignedInteger('level');
    }
}
