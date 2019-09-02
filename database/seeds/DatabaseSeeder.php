<?php

namespace Click\Elemental\Database\Seeds;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(EntrySeeder::class);
    }
}
