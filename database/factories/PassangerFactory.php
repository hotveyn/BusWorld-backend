<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Passanger>
 */
class PassangerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "birth_date" => fake()->date(),
            "place_from" => fake()->word(),
            "place_back" => fake()->word(),
        ];
    }
}
