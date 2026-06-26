<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // Urutan ini penting! Role dan User dulu sebelum News
            RoleAndAdminSeeder::class,
            VillageProfileSeeder::class,
            VillageOfficialSeeder::class,
            VillageStatisticSeeder::class,
            ComplaintCategorySeeder::class,
            NewsSeeder::class,
            TourismPlaceSeeder::class,
            UmkmSeeder::class,
            GallerySeeder::class,
            SiteSettingSeeder::class,
        ]);
    }
}