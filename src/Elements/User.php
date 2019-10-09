<?php

namespace Click\Elemental\Elements;

use Click\Elemental\Auth\BaseUser as Element;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Schemas\ElementSchema;

class User extends Element
{
    /**
     * @param ElementSchema $schema
     * @return void
     * @throws PropertyKeyInvalidException
     */
    public function getDefinition(ElementSchema $schema)
    {
        $schema->string('name');
        $schema->email('email')->unique();
        $schema->string('email');
        $schema->string('password');
        $schema->string('rememberToken');
    }
}