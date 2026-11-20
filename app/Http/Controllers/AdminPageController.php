<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Review;
use App\Models\User;
use Illuminate\Contracts\View\View;

class AdminPageController extends Controller
{
    public function index(): View
    {
        try {
            $totalCafes = Cafe::count();
            $averageRating = Cafe::avg('rating') ?? 0;
            $topCafes = Cafe::orderByDesc('rating')->take(5)->get();
        } catch (\Throwable) {
            $totalCafes = 0;
            $averageRating = 0;
            $topCafes = collect();
        }

        try {
            $users = User::latest()->take(5)->get();
        } catch (\Throwable) {
            $users = collect();
        }

        try {
            $newestReviews = Review::with(['user', 'cafe'])->latest()->take(5)->get();
        } catch (\Throwable) {
            $newestReviews = collect();
        }

        return view('admin-page', [
            'title' => 'PontiPin - Admin Dashboard',
            'totalCafes' => $totalCafes,
            'averageRating' => (float) $averageRating,
            'cafesNeedModeration' => 0,
            'reviewsNeedModeration' => 0,
            'topCafes' => $topCafes,
            'users' => $users,
            'newestReviews' => $newestReviews,
        ]);
    }
}
