<?php

use App\Models\Cafe;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the explore cafe page displays cafes from the database with detail links', function () {
    $firstCafe = Cafe::factory()->create([
        'name' => 'Kopi Khatulistiwa',
        'location' => 'Pontianak Utara',
    ]);
    $secondCafe = Cafe::factory()->create([
        'name' => 'Ruang Seduh',
        'location' => 'Pontianak Selatan',
    ]);

    $response = $this->get(route('explore-cafe.index'));

    $response->assertOk()
        ->assertSee($firstCafe->name)
        ->assertSee($firstCafe->location)
        ->assertSee(route('cafe-page.show', $firstCafe->id), false)
        ->assertSee($secondCafe->name)
        ->assertSee($secondCafe->location)
        ->assertSee(route('cafe-page.show', $secondCafe->id), false);
});

test('the explore cafe page filters cafes by search term, location, and tag', function () {
    Cafe::factory()->create([
        'name' => 'Kopi Senja',
        'location' => 'Pontianak Kota',
        'tags' => 'Coffee Shop, Study-Friendly',
    ]);
    Cafe::factory()->create([
        'name' => 'Kopi Pagi',
        'location' => 'Pontianak Selatan',
        'tags' => 'Outdoor',
    ]);
    Cafe::factory()->create([
        'name' => 'Teh Sore',
        'location' => 'Pontianak Kota',
        'tags' => 'Cozy',
    ]);

    $this->get(route('explore-cafe.index', ['search' => 'Senja']))
        ->assertOk()
        ->assertSee('Kopi Senja')
        ->assertDontSee('Kopi Pagi')
        ->assertDontSee('Teh Sore');

    $this->get(route('explore-cafe.index', ['location' => 'Pontianak Kota']))
        ->assertOk()
        ->assertSee('Kopi Senja')
        ->assertSee('Teh Sore')
        ->assertDontSee('Kopi Pagi');

    $this->get(route('explore-cafe.index', ['tag' => 'Outdoor']))
        ->assertOk()
        ->assertSee('Kopi Pagi')
        ->assertDontSee('Kopi Senja')
        ->assertDontSee('Teh Sore');
});

test('the explore cafe page sorts cafes by highest rating', function () {
    Cafe::factory()->create([
        'name' => 'Low Rated Cafe',
        'rating' => 3.5,
    ]);
    Cafe::factory()->create([
        'name' => 'High Rated Cafe',
        'rating' => 4.9,
    ]);

    $response = $this->get(route('explore-cafe.index', ['sort' => 'rating']));

    $response->assertOk()
        ->assertSeeInOrder(['High Rated Cafe', 'Low Rated Cafe']);
});

test('the explore cafe page shows an empty state when no cafes match', function () {
    Cafe::factory()->create(['name' => 'Kopi Pagi']);

    $response = $this->get(route('explore-cafe.index', ['search' => 'Nonexistent']));

    $response->assertOk()
        ->assertSee('Tidak ada cafe yang ditemukan.')
        ->assertSee('Reset filter');
});

test('the explore cafe show route redirects to the cafe detail page', function () {
    $cafe = Cafe::factory()->create();

    $response = $this->get(route('explore-cafe.show', $cafe->id));

    $response->assertRedirect(route('cafe-page.show', $cafe->id));
});
