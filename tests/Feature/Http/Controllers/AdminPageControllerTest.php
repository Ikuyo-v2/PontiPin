<?php

use App\Models\Cafe;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the admin dashboard route renders the dashboard view', function () {
    $response = $this->get(route('admin-page.index'));

    $response->assertOk();
    $response->assertSee('PontiPin admin dashboard');
    $response->assertSee('No cafes yet.');
    $response->assertSee('No menu items yet.');
    $response->assertSee('No reviews yet.');
});

test('guests can view menu items but not menu management controls', function () {
    $cafe = Cafe::factory()->create(['name' => 'Cafe with Menus']);
    $menu = Menu::factory()->for($cafe)->create(['name' => 'Guest-visible Espresso']);

    $this->get(route('admin-page.index'))
        ->assertOk()
        ->assertSee('Manage menu items')
        ->assertSee($cafe->name)
        ->assertSee($menu->name)
        ->assertDontSee('Add menu item')
        ->assertDontSee('data-menu-update-url=');
});

test('signed-in users can access menu management controls', function () {
    $user = User::query()->create([
        'name' => 'Menu Admin',
        'email' => 'menu-admin@example.test',
        'password' => 'password',
    ]);
    $cafe = Cafe::factory()->create();
    $menu = Menu::factory()->for($cafe)->create();

    $this->actingAs($user)
        ->get(route('admin-page.index'))
        ->assertOk()
        ->assertSee('Add menu item')
        ->assertSee('data-menu-update-url="'.route('admin.menus.update', $menu).'"', false)
        ->assertSee('data-menu-delete-url="'.route('admin.menus.destroy', $menu).'"', false);
});
