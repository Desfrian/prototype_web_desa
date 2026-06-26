<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'complaint_category_id', 'sender_name',
        'sender_phone', 'sender_address', 'content', 'status',
    ];

    // Relasi: pengaduan punya satu kategori
    public function category()
    {
        return $this->belongsTo(ComplaintCategory::class, 'complaint_category_id');
    }
}