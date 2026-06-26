<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageStatistic extends Model
{
    protected $fillable = [
        'label', 'value', 'unit', 'icon', 'order',
    ];
}