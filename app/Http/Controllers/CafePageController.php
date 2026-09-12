<?php

namespace App\Http\Controllers;

class CafePageController
{
    public function index()
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

        return view('CafePage', [
            'title' => $title,
            'cafe' => $cafe,
        ]);
    }

    public function show($id)
    {
        $title = 'PontiPin - Cafe Detail';

        return view('CafePage.show',
            ['title' => $title]
        );
    }

    public function create()
    {
        $title = 'PontiPin - Create Cafe';

        return view('CafePage.create',
            ['title' => $title]
        );
    }

    public function edit($id)
    {
        $title = 'PontiPin - Edit Cafe';

        return view('CafePage.edit',
            ['title' => $title]
        );
    }

    public function update($id)
    {
        $title = 'PontiPin - Update Cafe';

        return view('CafePage.update',
            ['title' => $title]
        );
    }

    public function destroy($id)
    {
        $title = 'PontiPin - Delete Cafe';

        return view('CafePage.destroy',
            ['title' => $title]
        );
    }
}
