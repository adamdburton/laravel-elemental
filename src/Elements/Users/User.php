<?php

namespace Click\Elemental\Elements\Users;

use Click\Elemental\Auth\BaseUser as Element;
use Click\Elements\Exceptions\Property\PropertyAlreadyDefinedException;
use Click\Elements\Exceptions\Property\PropertyKeyInvalidException;
use Click\Elements\Exceptions\Relation\RelationTypeNotValidException;
use Click\Elements\Schemas\ElementSchema;
use Click\Elements\Types\RelationType;

class User extends Element
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
        $schema->email('email')->unique();
        $schema->string('password');
        $schema->string('rememberToken');

        $schema->relation('group', Group::class, RelationType::SINGLE);
        $schema->relation('permissions', Permission::class, RelationType::MANY);
    }
}