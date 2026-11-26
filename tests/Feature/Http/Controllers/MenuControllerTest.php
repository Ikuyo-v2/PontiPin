<?php

use App\Models\Cafe;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('signed-in users can create menu items with uploaded images', function () {
    Storage::fake('public');
    $user = User::query()->create([
        'name' => 'Menu Admin',
        'email' => 'menu-admin@example.test',
        'password' => 'password',
    ]);
    $cafe = Cafe::factory()->create();

    $response = $this->actingAs($user)->post(route('admin.menus.store'), [
        'cafe_id' => $cafe->id,
        'name' => 'Iced Palm Sugar Latte',
        'category' => 'Coffee',
        'price' => 24000,
        'description' => 'Espresso with palm sugar.',
        'image_file' => UploadedFile::fake()->image('menu.jpg'),
    ]);

    $response->assertRedirect(route('admin-page.index'))
        ->assertSessionHas('success', "Menu item 'Iced Palm Sugar Latte' created successfully.");

    $menu = Menu::query()->where('name', 'Iced Palm Sugar Latte')->firstOrFail();

    $this->assertDatabaseHas('menus', [
        'cafe_id' => $cafe->id,
        'name' => 'Iced Palm Sugar Latte',
        'category' => 'Coffee',
        'price' => 24000,
    ]);
    Storage::disk('public')->assertExists($menu->image);
});

test('signed-in users can update menu items', function () {
    $user = User::query()->create([
        'name' => 'Menu Admin',
        'email' => 'menu-admin@example.test',
        'password' => 'password',
    ]);
    $cafe = Cafe::factory()->create();
    $menu = Menu::factory()->for($cafe)->create([
        'name' => 'Old Menu Name',
        'category' => 'Tea',
        'price' => 12000,
    ]);

    $response = $this->actingAs($user)->put(route('admin.menus.update', $menu), [
        'cafe_id' => $cafe->id,
        'name' => 'Updated Menu Name',
        'category' => 'Coffee',
        'price' => 18000,
        'description' => 'Updated description.',
    ]);

    $response->assertRedirect(route('admin-page.index'))
        ->assertSessionHas('success', "Menu item 'Updated Menu Name' updated successfully.");

    $this->assertDatabaseHas('menus', [
        'id' => $menu->id,
        'name' => 'Updated Menu Name',
        'category' => 'Coffee',
        'price' => 18000,
        'description' => 'Updated description.',
    ]);
});

test('signed-in users can delete menu items', function () {
    $user = User::query()->create([
        'name' => 'Menu Admin',
        'email' => 'menu-admin@example.test',
        'password' => 'password',
    ]);
    $cafe = Cafe::factory()->create();
    $menu = Menu::factory()->for($cafe)->create(['name' => 'Seasonal Menu Item']);

    $response = $this->actingAs($user)->delete(route('admin.menus.destroy', $menu));

    $response->assertRedirect(route('admin-page.index'))
        ->assertSessionHas('success', "Menu item 'Seasonal Menu Item' deleted successfully.");
    $this->assertDatabaseMissing('menus', ['id' => $menu->id]);
});

test('menu items cannot be created for a cafe that does not exist', function () {
    $user = User::query()->create([
        'name' => 'Menu Admin',
        'email' => 'menu-admin@example.test',
        'password' => 'password',
    ]);

    $this->actingAs($user)
        ->from(route('admin-page.index'))
        ->post(route('admin.menus.store'), [
            'cafe_id' => 999,
            'name' => 'Unlinked Menu Item',
            'price' => 12000,
        ])
        ->assertRedirect(route('admin-page.index'))
        ->assertSessionHasErrors('cafe_id');

    $this->assertDatabaseMissing('menus', ['name' => 'Unlinked Menu Item']);
});

test('guests are redirected to sign in before creating updating or deleting menu items', function () {
    $cafe = Cafe::factory()->create();
    $menu = Menu::factory()->for($cafe)->create();
    $payload = [
        'cafe_id' => $cafe->id,
        'name' => 'Unauthenticated Menu Change',
        'price' => 12000,
    ];

    $this->post(route('admin.menus.store'), $payload)
        ->assertRedirect(route('login'));
    $this->put(route('admin.menus.update', $menu), $payload)
        ->assertRedirect(route('login'));
    $this->delete(route('admin.menus.destroy', $menu))
        ->assertRedirect(route('login'));

    $this->assertDatabaseMissing('menus', ['name' => 'Unauthenticated Menu Change']);
    $this->assertDatabaseHas('menus', ['id' => $menu->id]);
});
