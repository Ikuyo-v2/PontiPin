<?php

use App\Models\Cafe;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a signed-in user can submit a review for a cafe', function () {
    $cafe = Cafe::factory()->create();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('cafe-page.reviews.store', $cafe), [
        'rating' => 3,
        'review' => 'A lovely place to study.',
    ]);

    $response->assertRedirect(route('cafe-page.show', $cafe))
        ->assertSessionHas('success', 'Your review has been submitted.');

    $review = Review::query()->sole();

    $this->assertModelExists($review);
    expect($review->user_id)->toBe($user->id)
        ->and($review->cafe_id)->toBe($cafe->id)
        ->and((float) $review->rating)->toBe(3.0)
        ->and($review->review)->toBe('A lovely place to study.');

    $this->get(route('cafe-page.show', $cafe))
        ->assertSee('action="'.route('cafe-page.reviews.store', $cafe).'"', false)
        ->assertSee('name="rating"', false)
        ->assertSee('name="review"', false)
        ->assertSee('Rated 3.0 out of 5', false)
        ->assertSee('A lovely place to study.')
        ->assertSee($user->name);
});

test('a guest cannot submit a review', function () {
    $cafe = Cafe::factory()->create();

    $this->post(route('cafe-page.reviews.store', $cafe), [
        'rating' => 5,
        'review' => 'A lovely place to study.',
    ])->assertRedirect(route('login'));

    $this->assertDatabaseCount('reviews', 0);
});

test('a review with an invalid rating and missing text is rejected', function () {
    $cafe = Cafe::factory()->create();
    $user = User::factory()->create();

    $this->actingAs($user)
        ->from(route('cafe-page.show', $cafe))
        ->post(route('cafe-page.reviews.store', $cafe), [
            'rating' => 6,
            'review' => '',
        ])
        ->assertRedirect(route('cafe-page.show', $cafe))
        ->assertSessionHasErrors([
            'rating' => 'The rating field must not be greater than 5.',
            'review' => 'The review field is required.',
        ]);

    $this->assertDatabaseCount('reviews', 0);
});
