<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = News::count();
        $totalKategori = Category::count();
        $totalUser = User::count();

        return view('dashboard', compact(
            'totalBerita',
            'totalKategori',
            'totalUser'
        ));
    }
}