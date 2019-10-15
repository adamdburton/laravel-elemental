<?php

namespace Click\Elemental\Http\Controllers;

use Illuminate\View\View;

class AppController
{
    /**
     * @return View
     */
    public function __invoke()
    {
        return view('elemental::app');
    }

    public function asset($filename)
    {
        $allowedTypes = [
            'css' => 'text/css',
            'js' => 'text/javascript',
            'png' => 'image/png',
            'ico' => 'image/vnd.microsoft.icon',
            'webmanifest' => 'application/json',
            'ttf' => 'font/ttf',
            'woff' => 'font/woff',
            'woff2' => 'font/woff2'
        ];

        $path = elemental_path('resources/public/' . ltrim($filename, '/'));
        $parts = explode('.', $path);
        $ext = $parts[count($parts) - 1];

        if (file_exists($path) && array_key_exists($ext, $allowedTypes)) {
            $content = file_get_contents($path);
            $headers = ['Content-Type' => $allowedTypes[$ext]];

            return response($content, 200, $headers);
        }

        return abort(404);
    }
}
