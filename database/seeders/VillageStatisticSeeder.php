<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageStatistic;

class VillageStatisticSeeder extends Seeder
{
    public function run(): void
    {
        $statistics = [
            ['label' => 'Jumlah Penduduk', 'value' => '4.520', 'unit' => 'Jiwa',  'icon' => 'groups',        'order' => 1],
            ['label' => 'Luas Wilayah',    'value' => '452',   'unit' => 'Ha',    'icon' => 'landscape',     'order' => 2],
            ['label' => 'Kelompok Tani',   'value' => '12',    'unit' => 'Grup',  'icon' => 'agriculture',   'order' => 3],
            ['label' => 'Kepala Keluarga', 'value' => '1.150', 'unit' => 'KK',    'icon' => 'home',          'order' => 4],
            ['label' => 'UMKM Aktif',      'value' => '87',    'unit' => 'Unit',  'icon' => 'storefront',    'order' => 5],
            ['label' => 'Destinasi Wisata','value' => '6',     'unit' => 'Lokasi','icon' => 'travel_explore', 'order' => 6],
        ];

        foreach ($statistics as $stat) {
            VillageStatistic::create($stat);
        }
    }
}