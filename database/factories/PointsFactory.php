<?php

namespace Database\Factories;

use App\Models\Teams;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Point>
 */
class PointsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teams_id' => Teams::all()->random()->id,
            'point' => fake()->numberBetween(-1000, 1000),
            'description' => fake()->sentence(),
            'created_at' => now()->subDays(rand(1, 100)),
        ];
    }
}
