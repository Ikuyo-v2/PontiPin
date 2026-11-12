<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ExploreCafeController extends Controller
{
    public function index(): View
    {
        $title = 'PontiPin - Cafe Catalog';
        // Temporary data of cafe
        $cafe = [
            [
                'name' => 'Kopi Kenangan',
                'id' => 1,
                'location' => 'Jl. Gajahmada',
                'rating' => 4.5,
                'tags' => 'Instagrammable, Cozy, Affordable',
                'Student-Friendly',
                'image' => 'https://example.com/images/kopi-kenangan.jpg',
                'subtitle' => 'Kafe yang nyaman dan cocok untuk belajar',
                'description' => 'Kopi Kenangan adalah kafe yang menawarkan suasana nyaman dan cocok untuk belajar. Dengan berbagai pilihan kopi dan makanan ringan, kafe ini menjadi tempat favorit bagi mahasiswa dan pelajar.',
            ],
            [
                'name' => 'Kopi Khatulistiwa',
                'id' => 2,
                'location' => 'Jl. Gajahmada',
                'rating' => 4.5,
                'tags' => 'Instagrammable, Cozy, Affordable',
                'Student-Friendly',
                'image' => 'https://example.com/images/kopi-khatulistiwa.jpg',
                'subtitle' => 'Kafe yang nyaman dan cocok untuk belajar',
                'description' => 'Kopi Khatulistiwa adalah kafe yang menawarkan suasana nyaman dan cocok untuk belajar. Dengan berbagai pilihan kopi dan makanan ringan, kafe ini menjadi tempat favorit bagi mahasiswa dan pelajar.',
            ],
            [
                'name' => 'Warung Upnormal',
                'id' => 3,
                'location' => 'Jl. Gajahmada',
                'rating' => 4.5,
                'tags' => 'Instagrammable, Cozy, Affordable',
                'Student-Friendly',
                'image' => 'https://example.com/images/warung-upnormal.jpg',
                'subtitle' => 'Kafe yang nyaman dan cocok untuk belajar',
                'description' => 'Warung Upnormal adalah kafe yang menawarkan suasana nyaman dan cocok untuk belajar. Dengan berbagai pilihan makanan dan minuman, kafe ini menjadi tempat favorit bagi mahasiswa dan pelajar.',
            ],

        ];

        return view('explore', [
            'title' => $title,
            'cafe' => $cafe,
        ]);
    }

    public function show(int $id): View
    {
        $title = 'PontiPin - Cafe Detail';

        return view('ExploreCafe.show',
            ['title' => $title]
        );
    }

    public function create(): View
    {
        $title = 'PontiPin - Create Cafe';

        return view('ExploreCafe.create',
            ['title' => $title]
        );
    }

    public function edit(int $id): View
    {
        $title = 'PontiPin - Edit Cafe';

        return view('ExploreCafe.edit',
            ['title' => $title]
        );
    }

    public function update(int $id): View
    {
        $title = 'PontiPin - Update Cafe';

        return view('ExploreCafe.update',
            ['title' => $title]
        );
    }

    public function destroy(int $id): View
    {
        $title = 'PontiPin - Delete Cafe';

        return view('ExploreCafe.destroy',
            ['title' => $title]
        );
    }
}
