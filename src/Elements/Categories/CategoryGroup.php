<?php

namespace Click\Elemental\Elements\Categories;

use Click\Elemental\Auth\BaseUser as Element;
use Click\Elemental\Elements\Fields\Field;
use Click\Elemental\Elements\Fields\Layout;
use Click\Elemental\Elements\Structures\Structure;
use Click\Elements\Exceptions\Property\PropertyAlreadyDefinedException;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Exceptions\Relation\RelationTypeNotValidException;
use Click\Elements\Schemas\ElementSchema;
use Click\Elements\Types\RelationType;

class CategoryGroup extends Element
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
        $schema->relation('structure', Structure::class, RelationType::SINGLE);
        $schema->relation('fieldLayout', Layout::class, RelationType::SINGLE);
    }
}