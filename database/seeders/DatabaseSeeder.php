<?php

namespace Database\Seeders;

use Database\Factories\StructureFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run():void
    {
        // \App\Models\User::factory(10)->create();
		 $this->call([
			 PermissionSeeder::class,
			 StructureSeeder::class
		 ]);
    }
}
