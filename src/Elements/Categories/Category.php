<?php

namespace Click\Elemental\Elements\Categories;

use Click\Elemental\Auth\BaseUser as Element;
use Click\Elemental\Elements\Fields\Field;
use Click\Elements\Exceptions\Property\PropertyAlreadyDefinedException;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Exceptions\Relation\RelationTypeNotValidException;
use Click\Elements\Schemas\ElementSchema;
use Click\Elements\Types\RelationType;

class Category extends Element
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
        $schema->relation('categoryGroup', CategoryGroup::class, RelationType::SINGLE);
        $schema->relation('parent', Category::class, RelationType::SINGLE);
    }
}