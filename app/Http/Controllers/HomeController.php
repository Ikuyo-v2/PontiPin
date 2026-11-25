<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $title = 'PontiPin - Cafe Catalog';
        $popularCafes = collect();
        $totalCafes = 0;
        $totalDistricts = 0;
        $vibes = collect();

        try {
            $popularCafes = Cafe::query()
                ->withCount('reviews')
                ->orderByDesc('rating')
                ->orderByDesc('reviews_count')
                ->orderByDesc('id')
                ->take(3)
                ->get();

            $totalCafes = Cafe::query()->count();
            $totalDistricts = Cafe::query()
                ->whereNotNull('location')
                ->where('location', '!=', '')
                ->distinct()
                ->count('location');

            $vibes = Cafe::tagCounts()->take(7);
        } catch (\Throwable) {
            $popularCafes = collect();
            $totalCafes = 0;
            $totalDistricts = 0;
            $vibes = collect();
        }

        return view('Home', [
            'title' => $title,
            'popularCafes' => $popularCafes,
            'totalCafes' => $totalCafes,
            'totalDistricts' => $totalDistricts,
            'vibes' => $vibes,
        ]);
    }

    public function show($id)
    {
        $title = 'PontiPin - Cafe Detail';

        return view('Home.show',
            ['title' => $title]
        );
    }

    public function create()
    {
        $title = 'PontiPin - Create Cafe';

        return view('Home.create',
            ['title' => $title]
        );
    }

    public function edit($id)
    {
        $title = 'PontiPin - Edit Cafe';

        return view('Home.edit',
            ['title' => $title]
        );
    }

    public function update($id)
    {
        $title = 'PontiPin - Update Cafe';

        return view('Home.update',
            ['title' => $title]
        );
    }

    public function destroy($id)
    {
        $title = 'PontiPin - Delete Cafe';

        return view('Home.destroy',
            ['title' => $title]
        );
    }
}
