<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { /* For seeding data */
        return [
            'users_id' => 1, // 'users_id' => $this->faker->numberBetween(1, 5),
            'pickup' => $this->faker->sentence(),
            'dropoff' => $this->faker->sentence(),
            'tags' => 'laravel, api, backend',
            'datetime' => $this->faker->dateTimeBetween('now', '+1 year'),
            'passengers' => $this->faker->numberBetween(1, 4),
            'ride' => $this->faker->randomElement(['offer', 'request']),
            'description' => $this->faker->paragraph(5),
        ];
    }
}
