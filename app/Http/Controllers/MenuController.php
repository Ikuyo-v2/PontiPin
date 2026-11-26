<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedMenuData($request);
        $menu = Menu::create($validated);

        return redirect()->route('admin-page.index')
            ->with('success', "Menu item '{$menu->name}' created successfully.");
    }

    public function update(Request $request, Menu $menu): RedirectResponse
    {
        $validated = $this->validatedMenuData($request);
        $menu->update($validated);

        return redirect()->route('admin-page.index')
            ->with('success', "Menu item '{$menu->name}' updated successfully.");
    }

    public function destroy(Menu $menu): RedirectResponse
    {
        $name = $menu->name;
        $menu->delete();

        return redirect()->route('admin-page.index')
            ->with('success', "Menu item '{$name}' deleted successfully.");
    }

    /**
     * @return array{cafe_id: int, name: string, category?: string|null, price: int, image?: string|null, description?: string|null}
     */
    private function validatedMenuData(Request $request): array
    {
        $validated = $request->validate([
            'cafe_id' => ['required', 'integer', 'exists:cafes,id'],
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:4096'],
            'description' => ['nullable', 'string'],
        ]);

        $validated['cafe_id'] = (int) $validated['cafe_id'];
        $validated['price'] = (int) $validated['price'];

        if ($request->hasFile('image_file')) {
            $validated['image'] = $request->file('image_file')->store('CAFES', 'public');
        }

        unset($validated['image_file']);

        return $validated;
    }
}
