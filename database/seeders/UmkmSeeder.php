<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Umkm;

class UmkmSeeder extends Seeder
{
    public function run(): void
    {
        $umkms = [
            [
                'name'        => 'Anyaman Bambu Kreatif',
                'category'    => 'Kerajinan',
                'description' => 'Produk anyaman berkualitas tinggi dari pengrajin lokal untuk kebutuhan dekorasi rumah tangga modern. Dibuat dari bambu pilihan yang dipanen secara berkelanjutan.',
                'owner'       => 'Pak Sarno',
                'contact'     => '081234567890',
                'order'       => 1,
            ],
            [
                'name'        => 'Kopi Robusta Amanah',
                'category'    => 'Hasil Bumi',
                'description' => 'Biji kopi pilihan dari kebun rakyat di ketinggian 800 mdpl yang diproses secara tradisional untuk menghasilkan aroma dan rasa yang kuat dan autentik.',
                'owner'       => 'Bu Ratna',
                'contact'     => '081298765432',
                'order'       => 2,
            ],
            [
                'name'        => 'Batik Tulis Motif Desa',
                'category'    => 'Wastra',
                'description' => 'Kain batik tulis dengan motif khas yang menceritakan filosofi kehidupan gotong royong warga desa. Setiap lembar dikerjakan selama 2-3 minggu oleh pengrajin berpengalaman.',
                'owner'       => 'Bu Endang',
                'contact'     => '085712345678',
                'order'       => 3,
            ],
            [
                'name'        => 'Gula Aren Organik',
                'category'    => 'Kuliner',
                'description' => 'Gula aren murni yang diproduksi dari nira pohon aren pilihan tanpa campuran bahan kimia. Cocok untuk minuman kesehatan dan masakan tradisional.',
                'owner'       => 'Pak Hendra',
                'contact'     => '082345678901',
                'order'       => 4,
            ],
        ];

        foreach ($umkms as $umkm) {
            Umkm::create($umkm);
        }
    }
}