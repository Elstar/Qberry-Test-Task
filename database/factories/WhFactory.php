<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wh>
 */
class WhFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'location_id' => 0,
            'temperature' => fake()->numberBetween(-50, -1),
            'max_blocks' => fake()->numberBetween(50, 500)
        ];
    }
}
