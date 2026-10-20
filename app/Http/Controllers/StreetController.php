<?php

namespace App\Http\Controllers;

use App\Models\Street;

class StreetController extends Controller
{
    //  list all streets
    public function index()
    {
        $streets = Street::latest()->get();
        return view('streets.index', compact('streets'));
    }

    //  single street details
    public function show(Street $street)
    {
        return view('streets.show', [
            'street' => $street,
        ]);
    }


}
