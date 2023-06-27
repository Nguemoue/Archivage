<?php

namespace Database\Factories;

use App\Models\SuperAdmin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

class SuperAdminFactory extends Factory
{
    protected $model = SuperAdmin::class;

    #[ArrayShape(['name' => "string", 'email' => "string", 'email_verified_at' => "\Illuminate\Support\Carbon", 'password' => "string", 'organisation' => "string", 'remember_token' => "string", 'created_at' => "\Illuminate\Support\Carbon", 'updated_at' => "\Illuminate\Support\Carbon"])]
	 public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->freeEmail(),
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt("password"),
            'organisation' => $this->faker->word(),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
