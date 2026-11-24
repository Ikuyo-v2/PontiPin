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
                'name' => 'CW Coffee',
                'location' => 'Pontianak',
                'address' => 'Pontianak, Kalimantan Barat',
                'latitude' => -0.026330,
                'longitude' => 109.342504,
                'rating' => 4.7,
                'opening_hours' => '08.00 – 23.00 WIB',
                'facilities' => 'Parking, Indoor & Outdoor Seating',
                'tags' => 'Coffee Shop, Hangout, Casual',
                'image' => 'CAFES/CW_CAFE.jpg',
                'subtitle' => 'Pontianak coffee spot',
                'description' => 'Coffee spot in Pontianak serving coffee and casual menu items.',
                'menus' => [
                    [
                        'name' => 'CW Signature Menu',
                        'price' => 25000,
                        'description' => 'Featured menu item from CW.',
                        'image' => 'CAFES/CW_MENU.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Elaia',
                'location' => 'Pontianak',
                'address' => 'Pontianak, Kalimantan Barat',
                'latitude' => -0.026330,
                'longitude' => 109.342504,
                'rating' => 4.7,
                'opening_hours' => '08.00 – 23.00 WIB',
                'facilities' => 'Parking, Seating Area',
                'tags' => 'Coffee Shop, Cozy, Cafe',
                'image' => 'CAFES/ELAIA_CAFE.jpg',
                'subtitle' => 'Cozy cafe in Pontianak',
                'description' => 'Cafe in Pontianak offering drinks and food selections.',
                'menus' => [
                    [
                        'name' => 'Elaia Featured Menu',
                        'price' => 25000,
                        'description' => 'Featured menu item from Elaia.',
                        'image' => 'CAFES/ELAIA_MENU.jpg',
                    ],
                ],
            ],
            [
                'name' => 'GOFFEE PONTIANAK',
                'location' => 'Pontianak Selatan',
                'address' => 'Jl. S. Parman No. 21',
                'latitude' => -0.036500,
                'longitude' => 109.335200,
                'rating' => 4.6,
                'opening_hours' => '07.00 – 00.00 WIB',
                'facilities' => 'Parking, Indoor & Outdoor Seating, Wi-Fi',
                'tags' => 'Coffee Shop, Doughnuts, Dessert',
                'image' => 'CAFES/GOFFEE_CAFE.jpg',
                'subtitle' => 'Coffee and potato doughnut spot',
                'description' => 'Cafe on Jl. S. Parman serving coffee, beverages, and potato doughnuts.',
                'menus' => [
                    [
                        'name' => 'Potato Doughnut',
                        'price' => 15000,
                        'description' => 'Soft potato doughnut with sweet toppings.',
                        'image' => 'CAFES/GOFFEE_MENU.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Haruna Perdana',
                'location' => 'Pontianak Selatan',
                'address' => 'Jl. Mitra Perdana No. 1',
                'latitude' => -0.056200,
                'longitude' => 109.331800,
                'rating' => 4.8,
                'opening_hours' => '07.00 – 02.00 WIB',
                'facilities' => 'Parking, Indoor & Outdoor Seating, Smoking Area',
                'tags' => 'Coffee Shop, Spacious, Calm',
                'image' => 'CAFES/HARUNA_CAFE.jpg',
                'subtitle' => 'Spacious coffee spot on Jalan Perdana',
                'description' => 'Spacious coffee shop on Jalan Perdana with coffee, drinks, and snacks.',
                'menus' => [
                    [
                        'name' => 'Haruna Signature Menu',
                        'price' => 25000,
                        'description' => 'Featured menu item from Haruna Perdana.',
                        'image' => 'CAFES/HARUNA_MENU.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Lokale',
                'location' => 'Pontianak',
                'address' => 'Pontianak, Kalimantan Barat',
                'latitude' => -0.026330,
                'longitude' => 109.342504,
                'rating' => 4.7,
                'opening_hours' => '08.00 – 23.00 WIB',
                'facilities' => 'Parking, Seating Area',
                'tags' => 'Coffee Shop, Local, Hangout',
                'image' => 'CAFES/LOKALE_CAFE.jpg',
                'subtitle' => 'Local coffee hangout in Pontianak',
                'description' => 'Local cafe in Pontianak serving coffee and signature menu items.',
                'menus' => [
                    [
                        'name' => 'Lokale Signature Menu',
                        'price' => 25000,
                        'description' => 'Featured menu item from Lokale.',
                        'image' => 'CAFES/LOKALE_MENU.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Macna',
                'location' => 'Pontianak',
                'address' => 'Pontianak, Kalimantan Barat',
                'latitude' => -0.026330,
                'longitude' => 109.342504,
                'rating' => 4.7,
                'opening_hours' => '08.00 – 23.00 WIB',
                'facilities' => 'Parking, Seating Area',
                'tags' => 'Coffee Shop, Cafe, Casual',
                'image' => 'CAFES/MACNA_CAFE.jpg',
                'subtitle' => 'Cafe in Pontianak',
                'description' => 'Cafe in Pontianak offering coffee, drinks, and food selections.',
                'menus' => [
                    [
                        'name' => 'Macna Signature Menu',
                        'price' => 25000,
                        'description' => 'Featured menu item from Macna.',
                        'image' => 'CAFES/MACNA_MENU.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Monriri',
                'location' => 'Pontianak',
                'address' => 'Pontianak, Kalimantan Barat',
                'latitude' => -0.026330,
                'longitude' => 109.342504,
                'rating' => 4.7,
                'opening_hours' => '08.00 – 23.00 WIB',
                'facilities' => 'Parking, Seating Area',
                'tags' => 'Coffee Shop, Cozy, Cafe',
                'image' => 'CAFES/MONRIRI_CAFE.jpg',
                'subtitle' => 'Cafe in Pontianak',
                'description' => 'Cafe in Pontianak serving coffee and menu selections.',
                'menus' => [
                    [
                        'name' => 'Monriri Signature Menu',
                        'price' => 25000,
                        'description' => 'Featured menu item from Monriri.',
                        'image' => 'CAFES/MONRIRI_MENU.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Sua',
                'location' => 'Pontianak',
                'address' => 'Pontianak, Kalimantan Barat',
                'latitude' => -0.026330,
                'longitude' => 109.342504,
                'rating' => 4.7,
                'opening_hours' => '08.00 – 23.00 WIB',
                'facilities' => 'Parking, Seating Area',
                'tags' => 'Coffee Shop, Cafe, Hangout',
                'image' => 'CAFES/SUA_CAFE.jpg',
                'subtitle' => 'Cafe in Pontianak',
                'description' => 'Cafe in Pontianak with coffee and food options.',
                'menus' => [
                    [
                        'name' => 'Sua Signature Menu',
                        'price' => 25000,
                        'description' => 'Featured menu item from Sua.',
                        'image' => 'CAFES/SUA_MENU.jpg',
                    ],
                ],
            ],
            [
                'name' => 'SUNDAY ATTACK',
                'location' => 'Pontianak Selatan',
                'address' => 'Komplek Museum Negeri Pontianak, Jl. Jenderal Ahmad Yani',
                'latitude' => -0.050400,
                'longitude' => 109.342200,
                'rating' => 4.7,
                'opening_hours' => 'Check Maps for latest hours',
                'facilities' => 'Parking, Casual Seating',
                'tags' => 'Coffee Shop, Casual, Hangout',
                'image' => 'CAFES/SUNDAY_ATTACK_CAFE.jpg',
                'subtitle' => 'Casual hangout spot near Museum Negeri',
                'description' => 'Casual hangout coffee spot near Komplek Museum Negeri Pontianak.',
                'menus' => [
                    [
                        'name' => 'Sunday Attack Signature Menu',
                        'price' => 25000,
                        'description' => 'Featured menu item from Sunday Attack.',
                        'image' => 'CAFES/SUNDAY_ATTACK_MENU.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Tumbuh',
                'location' => 'Pontianak',
                'address' => 'Pontianak, Kalimantan Barat',
                'latitude' => -0.026330,
                'longitude' => 109.342504,
                'rating' => 4.7,
                'opening_hours' => '08.00 – 23.00 WIB',
                'facilities' => 'Parking, Seating Area',
                'tags' => 'Coffee Shop, Cozy, Cafe',
                'image' => 'CAFES/TUMBUH_CAFE.jpg',
                'subtitle' => 'Cafe in Pontianak',
                'description' => 'Cafe in Pontianak serving coffee and menu offerings.',
                'menus' => [
                    [
                        'name' => 'Tumbuh Signature Menu',
                        'price' => 25000,
                        'description' => 'Featured menu item from Tumbuh.',
                        'image' => 'CAFES/TUMBUH_MENU.jpg',
                    ],
                ],
            ],
        ];

        foreach ($cafes as $cafeData) {
            $menus = $cafeData['menus'] ?? [];
            unset($cafeData['menus']);

            $cafe = Cafe::updateOrCreate(
                ['name' => $cafeData['name']],
                $cafeData
            );

            foreach ($menus as $menuData) {
                $cafe->menus()->updateOrCreate(
                    ['name' => $menuData['name']],
                    $menuData
                );
            }
        }
    }
}
