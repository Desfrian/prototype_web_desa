<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\VillageProfile;
use App\Models\VillageOfficial;
use App\Models\VillageStatistic;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = VillageProfile::first() ?? new VillageProfile([
            'village_name'     => 'Desa Amanah',
            'subdistrict'      => '-',
            'regency'          => '-',
            'province'         => '-',
            'postal_code'      => '-',
            'history'          => 'Sejarah desa belum diisi. Silakan lengkapi melalui panel admin.',
            'vision'           => 'Visi desa belum diisi.',
            'mission'          => 'Misi desa belum diisi.',
            'description'      => '',
            'head_of_village'  => '-',
            'established_year' => null,
        ]);

        $officials  = VillageOfficial::where('is_active', true)->orderBy('order')->get();
        $statistics = VillageStatistic::orderBy('order')->get();

        return view('frontend.profile.index', compact(
            'profile', 'officials', 'statistics'
        ));
    }
}