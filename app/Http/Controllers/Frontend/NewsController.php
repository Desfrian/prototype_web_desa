<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::published()
                    ->orderBy('published_at', 'desc')
                    ->paginate(6);

        return view('frontend.news.index', compact('news'));
    }

    public function show(string $slug)
    {
        $news = News::published()->where('slug', $slug)->firstOrFail();

        $relatedNews = News::published()
                          ->where('id', '!=', $news->id)
                          ->where('category', $news->category)
                          ->take(3)->get();

        return view('frontend.news.show', compact('news', 'relatedNews'));
    }
}