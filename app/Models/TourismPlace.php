<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourismPlace extends Model
{
    protected $fillable = [
        'name', 'category', 'description',
        'image', 'location', 'is_featured', 'order',
    ];
}