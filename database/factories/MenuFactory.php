<?php

namespace Database\Factories;

use App\Models\Cafe;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cafe_id' => Cafe::factory(),
            'name' => fake()->words(2, true),
            'category' => fake()->randomElement(['Coffee', 'Snacks', 'Tea']),
            'price' => fake()->randomElement([8000, 10000, 12000, 15000, 18000, 22000]),
            'image' => fake()->imageUrl(300, 300, 'coffee'),
            'description' => fake()->sentence(),
        ];
    }
}
