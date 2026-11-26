<?php

use App\Models\Cafe;
use App\Models\Menu;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the cafe detail page displays the selected cafe and its related database records', function () {
    $cafe = Cafe::factory()->create([
        'name' => 'Kedai Kopi Mawar',
        'location' => 'Pontianak Kota',
        'address' => 'Jalan Mawar 12',
        'opening_hours' => '07.00 – 21.00 WIB',
        'facilities' => 'Wi-Fi, Indoor Seating',
        'tags' => 'Cozy, Study-Friendly',
        'latitude' => -0.0263,
        'longitude' => 109.3425,
        'description' => 'Kopi lokal dengan suasana tenang.',
    ]);
    $menu = Menu::factory()->for($cafe)->create([
        'name' => 'Kopi Susu Mawar',
        'category' => 'Coffee',
        'price' => 12000,
        'image' => 'CAFES/CW_MENU.jpg',
        'description' => 'Espresso dengan susu.',
    ]);
    $reviewer = User::create([
        'name' => 'Rina Reviewer',
        'email' => 'rina@example.test',
        'password' => 'password',
    ]);
    $review = Review::factory()->for($cafe)->for($reviewer)->create([
        'review' => 'Tempat nyaman untuk belajar.',
        'rating' => 4.5,
    ]);

    $response = $this->get(route('cafe-page.show', $cafe->id));

    $response->assertOk()
        ->assertSee('src="'.asset('images/PontiPin.png').'"', false)
        ->assertSee($cafe->name)
        ->assertSee($cafe->address)
        ->assertSee($cafe->opening_hours)
        ->assertSee('Cozy')
        ->assertSee('Wi-Fi')
        ->assertSee('src="'.asset('CAFES/CW_MENU.jpg').'"', false)
        ->assertSee($menu->name)
        ->assertSee('Rp 12.000')
        ->assertSee($review->review)
        ->assertSee($review->user->name)
        ->assertSee('4.5', false)
        ->assertDontSee('Legendary old-school Pontianak coffee stall')
        ->assertDontSee('Sinta Maharani');
});

test('the cafe detail page shows an empty state when database details are missing', function () {
    $cafe = Cafe::factory()->create([
        'name' => 'Cafe Without Details',
        'facilities' => null,
        'latitude' => null,
        'longitude' => null,
    ]);

    $this->get(route('cafe-page.show', $cafe->id))
        ->assertOk()
        ->assertSee('No menu items have been added yet.')
        ->assertSee('No reviews have been added yet.')
        ->assertSee('No facilities listed.')
        ->assertSee('Map coordinates are not available.')
        ->assertDontSee('05.30 – 17.00 WIB');
});

test('the cafe detail route returns not found for a cafe that is not in the database', function () {
    $this->get(route('cafe-page.show', 999))
        ->assertNotFound();
});

test('the cafe page index displays the first cafe from the database', function () {
    $cafe = Cafe::factory()->create(['name' => 'First Cafe In Catalog']);

    $this->get(route('cafe-page.index'))
        ->assertOk()
        ->assertSee($cafe->name);
});
