<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name',        'value' => 'Desa Amanah'],
            ['key' => 'site_tagline',     'value' => 'Harmoni Alam & Kearifan Lokal'],
            ['key' => 'site_description', 'value' => 'Website resmi Pemerintah Desa Amanah'],
            ['key' => 'address',          'value' => 'Jl. Raya Desa Amanah No. 1, Kec. Lestari, Kab. Makmur, Jawa Barat 43291'],
            ['key' => 'phone',            'value' => '+62 812-3456-7890'],
            ['key' => 'email',            'value' => 'kontak@desa-amanah.id'],
            ['key' => 'whatsapp_number',  'value' => '62895634707159'],
            ['key' => 'office_hours',     'value' => 'Senin - Jumat: 08.00 - 15.00 WIB'],
            ['key' => 'maps_embed_url',   'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798392!2d107.6!3d-6.9!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTQnMDAuMCJTIDEwN8KwMzYnMDAuMCJF!5e0!3m2!1sid!2sid!4v1234567890'],
            ['key' => 'facebook_url',     'value' => 'https://facebook.com/desaamanah'],
            ['key' => 'instagram_url',    'value' => 'https://instagram.com/desaamanah'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::create($setting);
        }
    }
}