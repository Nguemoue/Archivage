<?php

namespace Database\Seeders;

use App\Models\Structure;
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

		 $this->call([
			 PermissionSeeder::class,
			 StructureSeeder::class,
			 FieldSeeder::class
		 ]);
		 \App\Models\User::updateOrCreate([
			 'email' => 'admin@gmail.com'
		 ],[
			 'password' => bcrypt('password'),
			 'name' => 'admin',
			 'email_verified_at' => now(),
			 'password_changed_at' => now(),
			 'structure_id' => Structure::first()?->id
		 ]);
    }
}
