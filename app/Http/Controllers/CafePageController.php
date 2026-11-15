<?php

namespace App\Http\Controllers;

class CafePageController extends Controller
{
// app/Http/Controllers/CafePageController.php

public function index()
{
    $title = 'PontiPin - Cafe Catalog';

    $cafe = [
        [
            'id' => 1,
            'name' => 'Kedai Kopi Aming',
            'location' => 'Jl. Gajahmada',
            'latitude' => -0.0278,
            'longitude' => 109.3442,
            'rating' => 4.8,
            'tags' => 'Coffee Shop, Affordable',
            'image' => 'https://images.unsplash.com/photo-1521017432531-fbd92d768814?q=80&w=900',
            'subtitle' => 'Legendary Pontianak coffee',
            'description' => 'Legendary old-school Pontianak coffee stall serving robusta.',
        ],
        // ...
    ];

    // Pick the first cafe to display on this page
    $selectedCafe = $cafe[0];

    return view('cafe-page', [
        'title' => $title,
        'cafe' => $selectedCafe,
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
