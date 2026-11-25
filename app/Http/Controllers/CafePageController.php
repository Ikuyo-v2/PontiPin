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
        return $this->renderCafe(Cafe::query()->firstOrFail());
    }

    public function show(int $id): View
    {
        return $this->renderCafe(Cafe::query()->findOrFail($id));
    }

    private function renderCafe(Cafe $cafe): View
    {
        $cafe->load(['menus', 'reviews.user']);
        $menus = $cafe->menus;
        $facilities = collect(explode(',', (string) $cafe->facilities))
            ->map(static fn (string $facility): string => trim($facility))
            ->filter()
            ->values();

        return view('cafe-page', [
            'title' => "PontiPin - {$cafe->name}",
            'cafe' => $cafe,
            'menus' => $menus,
            'menuCategories' => $menus->pluck('category')->filter()->unique()->values(),
            'reviews' => $cafe->reviews->sortByDesc('created_at')->values(),
            'facilities' => $facilities,
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
