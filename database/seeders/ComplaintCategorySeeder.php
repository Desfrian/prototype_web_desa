<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ComplaintCategory;

class ComplaintCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Infrastruktur & Jalan',
            'Pelayanan Administrasi',
            'Kesehatan & Lingkungan',
            'Keamanan & Ketertiban',
            'Sosial & Kemasyarakatan',
            'Saran & Aspirasi',
        ];

        foreach ($categories as $category) {
            ComplaintCategory::create(['name' => $category]);
        }
    }
}