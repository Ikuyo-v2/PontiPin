<?php

namespace Database\Seeders;

use App\Models\Cafe;
use Illuminate\Database\Seeder;

class CafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cafes = [
            [
                'name' => 'Kedai Kopi Aming',
                'location' => 'Pontianak Kota',
                'latitude' => -0.027814,
                'longitude' => 109.344215,
                'rating' => 5,
                'tags' => 'Coffee Shop, Affordable, Legendary',
                'image' => 'https://images.unsplash.com/photo-1521017432531-fbd92d768814?q=80&w=900&auto=format&fit=crop',
                'subtitle' => 'Legendary Pontianak coffee stall',
                'description' => 'Legendary old-school Pontianak coffee stall serving robusta since decades ago — strong, cheap, and authentic.',
            ],
            [
                'name' => 'Kopi Asiang',
                'location' => 'Pontianak Kota',
                'latitude' => -0.026421,
                'longitude' => 109.342930,
                'rating' => 5,
                'tags' => 'Coffee Shop, Legendary, Breakfast',
                'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?q=80&w=900&auto=format&fit=crop',
                'subtitle' => 'Famous shirtless barista brewing Hainan-style robusta',
                'description' => 'Iconic morning coffee stall known for smooth Hainan-style pulled coffee and fresh kaya toast.',
            ],
            [
                'name' => 'Kopi Khatulistiwa',
                'location' => 'Pontianak Utara',
                'latitude' => 0.000000,
                'longitude' => 109.321800,
                'rating' => 5,
                'tags' => 'Coffee Shop, Instagrammable, Study-Friendly',
                'image' => 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=900&auto=format&fit=crop',
                'subtitle' => 'Specialty coffee near the Equator Monument',
                'description' => 'A warm specialty coffee house near the Equator Monument, roasting single-origin Kalimantan beans.',
            ],
            [
                'name' => 'Ruang Seduh',
                'location' => 'Pontianak Selatan',
                'latitude' => -0.054320,
                'longitude' => 109.347510,
                'rating' => 5,
                'tags' => 'Co-working Cafe, Study-Friendly, Outdoor',
                'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=900&auto=format&fit=crop',
                'subtitle' => 'Minimalist space for deep work and specialty espresso',
                'description' => 'Minimalist co-working cafe with long communal tables, plenty of outlets, and a quiet zone for deep work.',
            ],
        ];

        foreach ($cafes as $cafe) {
            Cafe::firstOrCreate(['name' => $cafe['name']], $cafe);
        }
    }
}
