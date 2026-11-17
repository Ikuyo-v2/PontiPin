<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AdminPageController extends Controller
{
    public function index(): View
    {
        return view('admin-page', [
            'title' => 'PontiPin - Admin Dashboard',
        ]);
    }
}
