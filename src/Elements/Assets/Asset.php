<?php

namespace Click\Elemental\Elements\Assets;

use Click\Elements\Element;
use Click\Elements\Exceptions\Property\PropertyAlreadyDefinedException;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Exceptions\Relation\RelationTypeNotValidException;
use Click\Elements\Schemas\ElementSchema;
use Click\Elements\Types\RelationType;

class Asset extends Element
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
        $schema->relation('volumeFolder', VolumeFolder::class, RelationType::SINGLE);
        $schema->string('filename');
        $schema->string('kind');
        $schema->unsignedInteger('width');
        $schema->unsignedInteger('height');
        $schema->unsignedInteger('length');
        $schema->unsignedInteger('size');
        $schema->array('focalPoint');
    }
}
