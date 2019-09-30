<?php

use Click\Elemental\Elemental;
use Illuminate\Support\HtmlString;

if (!function_exists('elemental')) {
    /**
     * @return Elemental
     */
    function elemental()
    {
        return app('elemental');
    }
}

if (!function_exists('elemental_path')) {
    /**
     * @param string $path
     * @param null $dir
     * @return string
     */
    function elemental_path($path = '', $dir = null)
    {
        return rtrim(realpath(__DIR__ . '/../'), '/') . ($path ? '/' . ltrim($path, '/') : '');
    }
}

if (!function_exists('elemental_asset')) {
    /**
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
     * @param $path
     * @return HtmlString
     */
    function elemental_mix($path)
    {
        $manifest = json_decode(File::get(elemental_path('resources/assets/mix-manifest.json')), true);

        return new HtmlString(elemental_asset($manifest[$path]));
    }
}

if (!function_exists('package_path')) {
    /**
     * @param string $path
     * @return string
     */
    function package_path($path = '')
    {
        // TODO: Fix this to always return the BASE package path. Maybe check with existence of SP in namespace?

        $dir = base_path(debug_backtrace()[1]['file']);

        return rtrim(realpath($dir . '/../'), '/') . ($path ? '/' . ltrim($path, '/') : '');
    }
}
