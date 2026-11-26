<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Menu;
use App\Models\Review;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminPageController extends Controller
{
    public function index(): View
    {
        try {
            $totalCafes = Cafe::count();
            $averageRating = Cafe::avg('rating') ?? 0;
            $topCafes = Cafe::orderByDesc('rating')->get();
        } catch (\Throwable) {
            $totalCafes = 0;
            $averageRating = 0;
            $topCafes = collect();
        }

        try {
            $users = User::latest()->get();
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
            'cafes' => $topCafes,
            'menus' => Menu::with('cafe')->latest()->get(),
            'users' => $users,
            'newestReviews' => $newestReviews,
        ]);
    }

    public function destroyUser(int $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        if (auth()->check() && auth()->id() === $user->id) {
            return back()->with('error', 'You cannot delete your own account while logged in.');
        }

        $name = $user->name;
        $user->delete();

        return back()->with('success', "User '{$name}' deleted successfully.");
    }
}
