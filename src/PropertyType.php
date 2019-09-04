<?php

namespace Click\Elemental;

class PropertyType
{
    const PROPERTY_TYPE_BOOL = 'bool';
    const PROPERTY_TYPE_INT = 'int';
    const PROPERTY_TYPE_FLOAT = 'float';
    const PROPERTY_TYPE_STRING = 'string';
    const PROPERTY_TYPE_TEXT = 'text';
    const PROPERTY_TYPE_ARRAY = 'array';
    const PROPERTY_TYPE_JSON = 'json';
    const PROPERTY_TYPE_RELATION = 'relation';

    public static function getTypes()
    {
        return [
            self::PROPERTY_TYPE_BOOL,
            self::PROPERTY_TYPE_INT,
            self::PROPERTY_TYPE_FLOAT,
            self::PROPERTY_TYPE_STRING,
            self::PROPERTY_TYPE_TEXT,
            self::PROPERTY_TYPE_ARRAY,
            self::PROPERTY_TYPE_JSON,
            self::PROPERTY_TYPE_RELATION
        ];
    }
}
