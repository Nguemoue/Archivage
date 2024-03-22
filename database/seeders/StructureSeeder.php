<?php

namespace Database\Seeders;

use App\Models\Structure;
use Database\Factories\StructureFactory;
use Illuminate\Database\Seeder;

class StructureSeeder extends Seeder
{
    public function run():void
    {
        Structure::factory(3)->create();
    }
}
