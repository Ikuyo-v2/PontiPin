<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ExploreCafeController
{
    public function index(): View
    {
        $title = 'PontiPin - Explore Cafe';
        $cafe = $this->getCafeData();

        return view('explore', [
            'title' => $title,
            'cafe' => $cafe,
        ]);
    }

    public function show(int $id): View
    {
        return view('ExploreCafe.show', ['title' => 'PontiPin - Explore Detail']);
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

    private function getCafeData(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Kopi Kenangan',
                'location' => 'Jl. Gajahmada',
                'rating' => 4.5,
                'tags' => 'Instagrammable, Cozy, Affordable, Student-Friendly',
                'image' => 'https://example.com/images/kopi-kenangan.jpg',
                'subtitle' => 'Kafe yang nyaman dan cocok untuk belajar',
                'description' => 'Kopi Kenangan adalah kafe yang menawarkan suasana nyaman dan cocok untuk belajar.',
            ],
            [
                'id' => 2,
                'name' => 'Kopi Khatulistiwa',
                'location' => 'Jl. Gajahmada',
                'rating' => 4.5,
                'tags' => 'Instagrammable, Cozy, Affordable, Student-Friendly',
                'image' => 'https://example.com/images/kopi-khatulistiwa.jpg',
                'subtitle' => 'Kafe yang nyaman dan cocok untuk belajar',
                'description' => 'Kopi Khatulistiwa adalah kafe yang menawarkan suasana nyaman dan cocok untuk belajar.',
            ],
            [
                'id' => 3,
                'name' => 'Warung Upnormal',
                'location' => 'Jl. Gajahmada',
                'rating' => 4.5,
                'tags' => 'Instagrammable, Cozy, Affordable, Student-Friendly',
                'image' => 'https://example.com/images/warung-upnormal.jpg',
                'subtitle' => 'Kafe yang nyaman dan cocok untuk belajar',
                'description' => 'Warung Upnormal adalah kafe yang menawarkan suasana nyaman dan cocok untuk belajar.',
            ],
        ];
    }
}