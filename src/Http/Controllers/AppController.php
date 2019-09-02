<?php

namespace Click\Elemental\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;

class AppController
{
    /**
     * @return View
     */
    public function __invoke()
    {
        return view('elemental::app', [
            'css' => \File::get(__DIR__ . '/../../../assets/app.css'),
            'js' => \File::get(__DIR__ . '/../../../assets/app.js')
        ]);
    }
}
