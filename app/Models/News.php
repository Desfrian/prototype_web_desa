<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'user_id', 'title', 'slug', 'category',
        'excerpt', 'content', 'image', 'status', 'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Relasi: berita ditulis oleh user
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Scope: hanya ambil berita yang sudah published
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}