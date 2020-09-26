<?php

namespace Click\Elemental;

use Click\Elemental\Content\Elements\Entries\Entry;
use Click\Elemental\Content\Elements\Entries\Section;

class Elemental
{
    public function sections()
    {
        return Section::query();
    }

    public function entries()
    {
        return Entry::query();
    }
}
