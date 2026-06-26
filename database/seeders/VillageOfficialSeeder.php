<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageOfficial;

class VillageOfficialSeeder extends Seeder
{
    public function run(): void
    {
        $officials = [
            ['name' => 'H. Ahmad Fauzi, S.Sos', 'position' => 'Kepala Desa',       'order' => 1],
            ['name' => 'Siti Aminah, A.Md',      'position' => 'Sekretaris Desa',   'order' => 2],
            ['name' => 'Budi Santoso',            'position' => 'Bendahara Desa',    'order' => 3],
            ['name' => 'Rian Hidayat',            'position' => 'Kaur Perencanaan',  'order' => 4],
            ['name' => 'Dewi Rahayu',             'position' => 'Kaur Keuangan',     'order' => 5],
            ['name' => 'Supriadi',                'position' => 'Kasi Pemerintahan', 'order' => 6],
        ];

        foreach ($officials as $official) {
            VillageOfficial::create($official);
        }
    }
}