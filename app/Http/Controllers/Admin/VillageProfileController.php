<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageProfile;
use App\Models\VillageOfficial;
use App\Models\VillageStatistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageProfileController extends Controller
{
    public function index()
    {
        $profile    = VillageProfile::first() ?? new VillageProfile();
        $officials  = VillageOfficial::orderBy('order')->get();
        $statistics = VillageStatistic::orderBy('order')->get();

        return view('admin.village.index', compact('profile', 'officials', 'statistics'));
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'village_name'     => 'required|string|max:100',
            'subdistrict'      => 'nullable|string|max:100',
            'regency'          => 'nullable|string|max:100',
            'province'         => 'nullable|string|max:100',
            'postal_code'      => 'nullable|string|max:10',
            'head_of_village'  => 'nullable|string|max:100',
            'established_year' => 'nullable|integer|min:1000|max:' . date('Y'),
            'description'      => 'nullable|string',
            'history'          => 'nullable|string',
            'vision'           => 'nullable|string',
            'mission'          => 'nullable|string',
            'hero_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('hero_image')) {
            $profile = VillageProfile::first();
            if ($profile && $profile->hero_image) {
                Storage::disk('public')->delete($profile->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('village', 'public');
        }

        VillageProfile::updateOrCreate(['id' => VillageProfile::first()?->id], $validated);

        return redirect()->route('admin.village.index')
                         ->with('success', 'Profil desa berhasil diperbarui!');
    }

    // --- Perangkat Desa ---
    public function storeOfficial(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'order'    => 'integer|min:0',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('officials', 'public');
        }

        $validated['is_active'] = true;

        VillageOfficial::create($validated);

        return redirect()->route('admin.village.index')
                         ->with('success', 'Perangkat desa berhasil ditambahkan!');
    }

    public function destroyOfficial(VillageOfficial $official)
    {
        if ($official->photo) {
            Storage::disk('public')->delete($official->photo);
        }
        $official->delete();

        return redirect()->route('admin.village.index')
                         ->with('success', 'Perangkat desa berhasil dihapus!');
    }

    // --- Statistik Desa ---
    public function storeStatistic(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:100',
            'value' => 'required|string|max:50',
            'unit'  => 'nullable|string|max:20',
            'icon'  => 'nullable|string|max:50',
            'order' => 'integer|min:0',
        ]);

        VillageStatistic::create($validated);

        return redirect()->route('admin.village.index')
                         ->with('success', 'Statistik berhasil ditambahkan!');
    }

    public function destroyStatistic(VillageStatistic $statistic)
    {
        $statistic->delete();

        return redirect()->route('admin.village.index')
                         ->with('success', 'Statistik berhasil dihapus!');
    }
}
