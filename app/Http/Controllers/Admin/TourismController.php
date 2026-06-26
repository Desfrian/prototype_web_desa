<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourismPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourismController extends Controller
{
    public function index()
    {
        $places = TourismPlace::orderBy('order')->paginate(10);
        return view('admin.tourism.index', compact('places'));
    }

    public function create()
    {
        return view('admin.tourism.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string|max:100',
            'description' => 'required|string',
            'location'    => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'order'       => 'integer|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('tourism', 'public');
        }

        $validated['is_featured'] = $request->has('is_featured');

        TourismPlace::create($validated);

        return redirect()->route('admin.tourism.index')
                         ->with('success', 'Destinasi wisata berhasil ditambahkan!');
    }

    public function edit(TourismPlace $tourism)
    {
        return view('admin.tourism.edit', compact('tourism'));
    }

    public function update(Request $request, TourismPlace $tourism)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string|max:100',
            'description' => 'required|string',
            'location'    => 'nullable|string|max:255',
            'order'       => 'integer|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($tourism->image) Storage::disk('public')->delete($tourism->image);
            $validated['image'] = $request->file('image')->store('tourism', 'public');
        }

        $validated['is_featured'] = $request->has('is_featured');

        $tourism->update($validated);

        return redirect()->route('admin.tourism.index')
                         ->with('success', 'Destinasi wisata berhasil diperbarui!');
    }

    public function destroy(TourismPlace $tourism)
    {
        if ($tourism->image) Storage::disk('public')->delete($tourism->image);
        $tourism->delete();

        return redirect()->route('admin.tourism.index')
                         ->with('success', 'Destinasi wisata berhasil dihapus!');
    }
}