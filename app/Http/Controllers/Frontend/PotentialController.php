<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TourismPlace;
use App\Models\Umkm;

class PotentialController extends Controller
{
    public function index()
    {
        $tourismPlaces = TourismPlace::orderBy('order')->get();
        $umkms         = Umkm::where('is_active', true)->orderBy('order')->get();

        return view('frontend.potential.index', compact(
            'tourismPlaces', 'umkms'
        ));
    }
}