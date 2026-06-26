<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TourismPlace;

class TourismPlaceSeeder extends Seeder
{
    public function run(): void
    {
        $places = [
            [
                'name'        => 'Air Terjun Tirta Amanah',
                'category'    => 'Alam & Petualangan',
                'description' => 'Pesona air terjun tersembunyi dengan ketinggian 35 meter dan kejernihan air pegunungan yang menyegarkan jiwa. Dikelilingi hutan tropis yang masih asri dan suara alam yang menenangkan.',
                'location'    => 'Dusun Wetan, Desa Amanah',
                'is_featured' => true,
                'order'       => 1,
            ],
            [
                'name'        => 'Lembah Hijau Terasering',
                'category'    => 'Ekowisata',
                'description' => 'Hamparan sawah terasering yang membentang indah di lereng bukit. Pemandangan terbaik dapat dinikmati saat matahari terbit antara pukul 05.30 - 07.00 pagi.',
                'location'    => 'Dusun Kulon, Desa Amanah',
                'is_featured' => true,
                'order'       => 2,
            ],
            [
                'name'        => 'Sungai Bening Desa',
                'category'    => 'Ekowisata',
                'description' => 'Sungai dengan kejernihan air yang luar biasa mengalir tenang di tengah desa. Pengunjung dapat menikmati aktivitas tubing, memancing, atau sekadar bermain air di tepiannya.',
                'location'    => 'Pusat Desa Amanah',
                'is_featured' => true,
                'order'       => 3,
            ],
            [
                'name'        => 'Camping Ground Puncak Amanah',
                'category'    => 'Petualangan',
                'description' => 'Area berkemah di puncak bukit dengan pemandangan 360 derajat yang memukau. Tersedia fasilitas toilet, air bersih, dan pemandu lokal berpengalaman.',
                'location'    => 'Bukit Amanah, Desa Amanah',
                'is_featured' => true,
                'order'       => 4,
            ],
        ];

        foreach ($places as $place) {
            TourismPlace::create($place);
        }
    }
}