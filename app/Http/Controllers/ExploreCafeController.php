<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ExploreCafeController extends Controller
{
    public function index(Request $request): View
    {
        $title = 'PontiPin - Explore Cafe';
        $search = trim((string) $request->query('search', ''));
        $location = trim((string) $request->query('location', ''));
        $tag = trim((string) $request->query('tag', ''));
        $sort = trim((string) $request->query('sort', 'populer'));

        $cafes = collect();
        $locations = collect();
        $availableTags = collect();

        try {
            $query = Cafe::query()
                ->withCount('reviews')
                ->search($search)
                ->inLocation($location)
                ->withTag($tag);

            match ($sort) {
                'rating' => $query->orderByDesc('rating')->orderByDesc('reviews_count')->orderBy('id'),
                'latest' => $query->latest('id'),
                default => $query->orderByDesc('reviews_count')->orderByDesc('rating')->orderBy('id'),
            };

            $cafes = $query->get();

            $locations = Cafe::query()
                ->whereNotNull('location')
                ->where('location', '!=', '')
                ->distinct()
                ->orderBy('location')
                ->pluck('location');

            $availableTags = Cafe::tagCounts()->pluck('name');
        } catch (\Throwable) {
            $cafes = collect();
            $locations = collect();
            $availableTags = collect();
        }

        return view('explore', [
            'title' => $title,
            'cafes' => $cafes,
            'locations' => $locations,
            'availableTags' => $availableTags,
            'filters' => [
                'search' => $search,
                'location' => $location,
                'tag' => $tag,
                'sort' => $sort,
            ],
        ]);
    }

    public function show(int $id): RedirectResponse
    {
        return redirect()->route('cafe-page.show', $id);
    }

    public function create(): View
    {
        return view('ExploreCafe.create', ['title' => 'PontiPin - Create Explore Cafe']);
    }

    public function edit(int $id): View
    {
        return view('ExploreCafe.edit', ['title' => 'PontiPin - Edit Explore Cafe']);
    }

    public function update(int $id): View
    {
        return view('ExploreCafe.update', ['title' => 'PontiPin - Update Explore Cafe']);
    }

    public function destroy(int $id): View
    {
        return view('ExploreCafe.destroy', ['title' => 'PontiPin - Delete Explore Cafe']);
    }
}
