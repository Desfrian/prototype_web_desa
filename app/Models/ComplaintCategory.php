<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintCategory extends Model
{
    protected $fillable = ['name'];

    // Relasi: satu kategori punya banyak pengaduan
    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}