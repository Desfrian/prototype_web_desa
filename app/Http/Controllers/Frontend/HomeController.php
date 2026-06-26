<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\VillageProfile;
use App\Models\VillageStatistic;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {
        $profile    = VillageProfile::first();
        $statistics = VillageStatistic::orderBy('order')->take(3)->get();
        $latestNews = News::published()->orderBy('published_at', 'desc')->take(3)->get();
        $galleries  = Gallery::orderBy('order')->take(4)->get();

        return view('frontend.home.index', compact(
            'profile', 'statistics', 'latestNews', 'galleries'
        ));
    }
}