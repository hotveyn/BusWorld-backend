<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "trip_code" => fake()->unique()->numberBetween(100000, 1000000),
            "from_id" => fake()->numberBetween(1, 4),
            "to_id" => fake()->numberBetween(1, 4),
            "time_from" => fake()->time(),
            "time_to" => fake()->time(),
            "cost" => fake()->numberBetween(1000, 5000),
        ];
    }
}
