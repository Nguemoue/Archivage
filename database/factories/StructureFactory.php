<?php

namespace Database\Factories;

use App\Models\Structure;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StructureFactory extends Factory
{
    protected $model = Structure::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->unique()->word(),
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
