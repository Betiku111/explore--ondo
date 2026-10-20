<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Street;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStreets = Street::count();
        $popularCount = Street::where('is_popular', true)->count();
        $recentStreets = Street::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalStreets', 'popularCount', 'recentStreets'));
    }
}