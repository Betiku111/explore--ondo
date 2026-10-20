<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Street;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StreetController extends Controller
{
    public function index()
    {
        $streets = Street::latest()->paginate(10);
        return view('admin.streets.index', compact('streets'));
    }

    public function create()
    {
        return view('admin.streets.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data['is_popular'] = $request->has('is_popular');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('streets', 'public');
        }

        Street::create($data);

        return redirect()->route('admin.streets.index')->with('success', 'Street created.');
    }

    public function update(Request $request, Street $street)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data['is_popular'] = $request->boolean('is_popular');
        $previousImage = $street->image;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('streets', 'public');
        }

        $street->update($data);

        if (isset($data['image']) && $previousImage) {
            Storage::disk('public')->delete($previousImage);
        }

        return redirect()->route('admin.streets.index')->with('success', 'Street updated.');
    }

    public function destroy(Street $street)
    {
        if ($street->image) {
            Storage::disk('public')->delete($street->image);
        }

        $street->delete();
        return redirect()->route('admin.streets.index')->with('success', 'Street deleted.');
    }

    public function details(Street $street)
    {
        return view('admin.streets.details', [
            'street' => $street,
        ]);
    }
}
