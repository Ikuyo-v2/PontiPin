<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Cafe $cafe): RedirectResponse
    {
        $validated = $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'review' => ['required', 'string', 'max:2000'],
        ]);

        Review::query()->create([
            'user_id' => $request->user()->getAuthIdentifier(),
            'cafe_id' => $cafe->id,
            ...$validated,
        ]);

        return redirect()
            ->route('cafe-page.show', $cafe)
            ->with('success', 'Your review has been submitted.');
    }
}
