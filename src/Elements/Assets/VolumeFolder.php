<?php

namespace Click\Elemental\Elements\Assets;

use Click\Elements\Element;
use Click\Elements\Exceptions\Property\PropertyAlreadyDefinedException;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Exceptions\Relation\RelationTypeNotValidException;
use Click\Elements\Schemas\ElementSchema;
use Click\Elements\Types\RelationType;

class VolumeFolder extends Element
{
    /**
     * @param ElementSchema $schema
     * @return void
     * @throws PropertyAlreadyDefinedException
     * @throws PropertyKeyInvalidException
     * @throws RelationTypeNotValidException
     */
    public function getDefinition(ElementSchema $schema)
    {
        $schema->relation('volume', Volume::class, RelationType::SINGLE);
        $schema->relation('parent', VolumeFolder::class, RelationType::SINGLE);
        $schema->string('name');
        $schema->string('path');
    }
}
