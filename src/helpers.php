<?php

use Click\Elemental\Elemental;

if (!function_exists('elemental_path')) {
    /**
     * @param string $path
     * @return string
     */
    function elemental_path($path = '')
    {
        return rtrim(realpath(__DIR__ . '../../'), '/') . ($path ? '/' . ltrim($path) : '');
    }
}

if (!function_exists('elemental')) {
    /**
     * @return Elemental
     */
    function elemental()
    {
        return app('elemental');
    }
}