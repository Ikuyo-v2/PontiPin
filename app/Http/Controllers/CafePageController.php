<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CafePageController extends Controller
{
    public function index(): View
    {
        $title = 'PontiPin - Cafe Catalog';
        $selectedCafe = null;
        $menus = collect();

        try {
            $selectedCafe = Cafe::query()->first();
            $menus = $selectedCafe?->menus()->get() ?? collect();
        } catch (\Throwable) {
            $selectedCafe = null;
            $menus = collect();
        }

        if ($menus->isEmpty()) {
            $menus = collect([
                [
                    'name' => 'Kopi O Panas',
                    'category' => 'Coffee',
                    'price' => 8000,
                    'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=200&auto=format&fit=crop',
                    'description' => 'Classic black robusta, brewed the old way.',
                ],
                [
                    'name' => 'Kopi Susu Aming',
                    'category' => 'Coffee',
                    'price' => 10000,
                    'image' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?q=80&w=200&auto=format&fit=crop',
                    'description' => 'Robusta with condensed milk, sweet and strong.',
                ],
            ]);
        }

        return view('cafe-page', [
            'title' => $title,
            'cafe' => $selectedCafe?->toArray(),
            'menus' => $menus,
        ]);
    }

    public function show(int $id): View
    {
        $cafe = Cafe::with('menus')->findOrFail($id);

        return view('cafe-page', [
            'title' => "PontiPin - {$cafe->name}",
            'cafe' => $cafe->toArray(),
            'menus' => $cafe->menus,
        ]);
    }

    public function create(): RedirectResponse
    {
        return redirect()->route('admin-page.index', ['action' => 'create']);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'rating' => ['nullable', 'numeric', 'min:0', 'max:5'],
            'opening_hours' => ['nullable', 'string', 'max:255'],
            'facilities' => ['nullable', 'string'],
            'tags' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:4096'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('CAFES', 'public');
            $validated['image'] = $path;
        }

        unset($validated['image_file']);

        if (! isset($validated['rating']) || $validated['rating'] === null) {
            $validated['rating'] = 5.0;
        }

        $cafe = Cafe::create($validated);

        return back()->with('success', "Cafe '{$cafe->name}' created successfully.");
    }

    public function edit(int $id): RedirectResponse
    {
        return redirect()->route('admin-page.index', ['edit' => $id]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $cafe = Cafe::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'rating' => ['nullable', 'numeric', 'min:0', 'max:5'],
            'opening_hours' => ['nullable', 'string', 'max:255'],
            'facilities' => ['nullable', 'string'],
            'tags' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:4096'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('CAFES', 'public');
            $validated['image'] = $path;
        }

        unset($validated['image_file']);

        $cafe->update($validated);

        return back()->with('success', "Cafe '{$cafe->name}' updated successfully.");
    }

    public function destroy(int $id): RedirectResponse
    {
        $cafe = Cafe::findOrFail($id);
        $name = $cafe->name;
        $cafe->delete();

        return back()->with('success', "Cafe '{$name}' deleted successfully.");
    }
}
