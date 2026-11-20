<?php

namespace App\Http\Controllers;

use App\Models\Cafe;

class CafePageController extends Controller
{
    // app/Http/Controllers/CafePageController.php

    public function index()
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
                [
                    'name' => 'Roti Srikaya',
                    'category' => 'Snacks',
                    'price' => 12000,
                    'image' => 'https://images.unsplash.com/photo-1587049352846-4a222e784d38?q=80&w=200&auto=format&fit=crop',
                    'description' => 'Toasted bread with homemade kaya jam.',
                ],
                [
                    'name' => 'Teh Obeng',
                    'category' => 'Tea',
                    'price' => 6000,
                    'image' => 'https://images.unsplash.com/photo-1499638673689-79a0b5115d87?q=80&w=200&auto=format&fit=crop',
                    'description' => 'Iced sweet tea, Pontianak style.',
                ],
            ]);
        }

        return view('cafe-page', [
            'title' => $title,
            'cafe' => $selectedCafe?->toArray(),
            'menus' => $menus,
        ]);
    }

    public function show($id)
    {
        $title = 'PontiPin - Cafe Detail';

        return view('cafe-page.show',
            ['title' => $title]
        );
    }

    public function create()
    {
        $title = 'PontiPin - Create Cafe';

        return view('cafe-page.create',
            ['title' => $title]
        );
    }

    public function edit($id)
    {
        $title = 'PontiPin - Edit Cafe';

        return view('cafe-page.edit',
            ['title' => $title]
        );
    }

    public function update($id)
    {
        $title = 'PontiPin - Update Cafe';

        return view('cafe-page.update',
            ['title' => $title]
        );
    }

    public function destroy($id)
    {
        $title = 'PontiPin - Delete Cafe';

        return view('cafe-page.destroy',
            ['title' => $title]
        );
    }
}
