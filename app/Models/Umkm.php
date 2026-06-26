<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = [
        'name', 'category', 'description',
        'image', 'owner', 'contact', 'is_active', 'order',
    ];
}