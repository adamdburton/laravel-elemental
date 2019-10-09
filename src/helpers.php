<?php

use Illuminate\Support\HtmlString;

if (!function_exists('elemental_path')) {
    /**
     * Returns an absolute path to the elemental vendor directory, with optional relative path appended.
     *
     * @param string $path
     * @return string
     */
    function elemental_path($path = '')
    {
        return rtrim(realpath(__DIR__ . '/../'), '/') . ($path ? '/' . ltrim($path, '/') : '');
    }
}

if (!function_exists('elemental_asset')) {
    /**
     * Returns a full url to an asset in the elemental public directory.
     *
     * @param string $path
     * @return string
     */
    function elemental_asset($path = '')
    {
        return route('elemental.asset', ltrim($path, '/'));
    }
}

if (!function_exists('elemental_mix')) {
    /**
     * Same as mix() but relative to the elemental public path.
     *
     * @param $path
     * @return HtmlString
     */
    function elemental_mix($path)
    {
        $manifest = json_decode(file_get_contents(elemental_path('resources/public/mix-manifest.json')), true);

        return new HtmlString(elemental_asset($manifest[$path]));
    }
}

if (!function_exists('package_path')) {
    /**
     * Returns an absolute path to an elemental module directory, with optional relative path appended.
     *
     * @param string $path
     * @return string
     */
    function package_path($path = '')
    {
        // TODO: Fix this to return the elemental path if called from a subclass extending an elemental class.

        // Maybe look in the stack?

        $dir = base_path(debug_backtrace()[1]['file']);

        // Maybe check with existence of ServProv in namespace root to validate?

        return rtrim(realpath($dir . '/../'), '/') . ($path ? '/' . ltrim($path, '/') : '');
    }
}
