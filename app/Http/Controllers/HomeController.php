<?php

namespace App\Http\Controllers;

use App\Models\Street;

class HomeController extends Controller
{
    public function index()
    {
        $popularStreets = Street::where('is_popular', true)->get();
        return view('home', compact('popularStreets'));
    }
}