<?php

namespace Click\Elemental\Elements\Fields;

use Click\Elemental\Auth\BaseUser as Element;
use Click\Elements\Exceptions\Property\PropertyAlreadyDefinedException;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Exceptions\Relation\RelationTypeNotValidException;
use Click\Elements\Schemas\ElementSchema;
use Click\Elements\Types\RelationType;

class LayoutField extends Element
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
        $schema->relation('fieldLayout', Layout::class, RelationType::SINGLE);
        $schema->relation('fieldLayoutGroup', LayoutGroup::class, RelationType::SINGLE);
        $schema->relation('field', Layout::class, RelationType::SINGLE);
        $schema->unsignedInteger('sortOrder');
        $schema->json('settings');
    }
}