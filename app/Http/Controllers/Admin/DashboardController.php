<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Complaint;
use App\Models\TourismPlace;
use App\Models\Umkm;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_news'          => News::count(),
            'published_news'      => News::where('status', 'published')->count(),
            'total_complaints'    => Complaint::count(),
            'new_complaints'      => Complaint::where('status', 'baru')->count(),
            'total_tourism'       => TourismPlace::count(),
            'total_umkm'          => Umkm::count(),
        ];

        $latestComplaints = Complaint::with('category')
                                     ->latest()
                                     ->take(5)
                                     ->get();

        $latestNews = News::latest()->take(5)->get();

        return view('admin.dashboard.index', compact(
            'stats', 'latestComplaints', 'latestNews'
        ));
    }
}