<?php

namespace Database\Factories;

use App\Models\Cafe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cafe>
 */
class CafeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company() . ' Coffee',
            'location' => fake()->randomElement(['Pontianak Kota', 'Pontianak Selatan', 'Pontianak Utara', 'Pontianak Barat']),
            'address' => fake()->streetAddress(),
            'latitude' => fake()->latitude(-0.06, 0.01),
            'longitude' => fake()->longitude(109.30, 109.36),
            'rating' => fake()->randomFloat(1, 4.0, 5.0),
            'opening_hours' => '07.00 – 22.00 WIB',
            'facilities' => 'Parking, Wi-Fi, Indoor Seating',
            'tags' => 'Coffee Shop, Study-Friendly',
            'image' => 'https://images.unsplash.com/photo-1521017432531-fbd92d768814?q=80&w=900&auto=format&fit=crop',
            'subtitle' => fake()->sentence(6),
            'description' => fake()->paragraph(),
        ];
    }
}
