<?php

namespace Click\Elemental\Elements\Users;

use Click\Elemental\Auth\BaseUser as Element;
use Click\Elements\Exceptions\Property\PropertyAlreadyDefinedException;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Schemas\ElementSchema;

class Permission extends Element
{
    /**
     * @param ElementSchema $schema
     * @return void
     * @throws PropertyKeyInvalidException
     * @throws PropertyAlreadyDefinedException
     */
    public function getDefinition(ElementSchema $schema)
    {
        $schema->string('identifier');
        $schema->string('description');
    }
}