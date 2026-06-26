<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    protected $fillable = [
        'village_name', 'subdistrict', 'regency', 'province',
        'postal_code', 'history', 'vision', 'mission',
        'description', 'head_of_village', 'established_year', 'hero_image',
    ];
}