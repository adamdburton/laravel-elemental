<?php

namespace Click\Elemental\Http\Controllers;

use Click\Elemental\Elemental;
use Illuminate\View\View;

class CmsController
{
    /**
     * @param Elemental $elemental
     * @return View
     */
    public function entry(Elemental $elemental)
    {
//        $entry = $elemental->entries()->current();
//
//        return view($entry->getTemplate(), compact('entry'));
    }

    public function action()
    {

    }
}
