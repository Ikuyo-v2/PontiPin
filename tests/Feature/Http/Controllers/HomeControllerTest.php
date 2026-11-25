<?php

use App\Models\Cafe;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the home page displays top rated cafes and catalog counts from the database', function () {
    $topCafe = Cafe::factory()->create([
        'name' => 'Kopi Khatulistiwa',
        'location' => 'Pontianak Kota',
        'rating' => 4.9,
        'tags' => 'Coffee Shop, Study-Friendly',
    ]);
    $secondCafe = Cafe::factory()->create([
        'name' => 'Ruang Seduh',
        'location' => 'Pontianak Selatan',
        'rating' => 4.8,
        'tags' => 'Co-working Cafe, Study-Friendly',
    ]);
    $thirdCafe = Cafe::factory()->create([
        'name' => 'Kedai Aming',
        'location' => 'Pontianak Kota',
        'rating' => 4.7,
        'tags' => 'Coffee Shop, Affordable',
    ]);
    $fourthCafe = Cafe::factory()->create([
        'name' => 'Hidden Spot Cafe',
        'location' => 'Pontianak Selatan',
        'rating' => 4.1,
        'tags' => 'Outdoor',
    ]);

    $response = $this->get(route('home'));

    $response->assertOk()
        ->assertSee($topCafe->name)
        ->assertSee($secondCafe->name)
        ->assertSee($thirdCafe->name)
        ->assertDontSee($fourthCafe->name)
        ->assertSee(route('cafe-page.show', $topCafe->id), false)
        ->assertSee(route('explore-cafe.index', ['tag' => 'Coffee Shop']), false)
        ->assertSee('4')
        ->assertSee('2');
});

test('the home page shows an empty state when no cafes exist', function () {
    $response = $this->get(route('home'));

    $response->assertOk()
        ->assertSee('No cafes available yet.')
        ->assertSee('No cafe vibes catalogued yet.');
});
