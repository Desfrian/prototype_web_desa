<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            ['title' => 'Gotong Royong Pembersihan Sungai', 'caption' => 'Warga bersama-sama membersihkan aliran Sungai Bening setiap bulan', 'order' => 1],
            ['title' => 'Festival Panen Raya 2024',         'caption' => 'Perayaan syukur atas hasil bumi yang melimpah tahun ini',         'order' => 2],
            ['title' => 'Musyawarah Desa Tahunan',          'caption' => 'Forum musyawarah desa dalam menentukan program pembangunan',       'order' => 3],
            ['title' => 'Pasar Rakyat Mingguan',            'caption' => 'Pasar tradisional yang menjual produk UMKM dan hasil tani lokal',  'order' => 4],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}