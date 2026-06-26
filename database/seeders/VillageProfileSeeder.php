<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageProfile;

class VillageProfileSeeder extends Seeder
{
    public function run(): void
    {
        VillageProfile::create([
            'village_name'     => 'Desa Amanah',
            'subdistrict'      => 'Kecamatan Lestari',
            'regency'          => 'Kabupaten Makmur',
            'province'         => 'Jawa Barat',
            'postal_code'      => '43291',
            'head_of_village'  => 'H. Ahmad Fauzi, S.Sos',
            'established_year' => 1845,
            'description'      => 'Desa Amanah adalah desa percontohan yang memadukan kearifan lokal dengan kemajuan teknologi digital untuk mewujudkan masyarakat yang sejahtera dan mandiri.',
            'history'          => 'Berdiri sejak tahun 1845, Desa Amanah bermula dari sebuah pemukiman kecil di lembah hijau yang subur. Nama "Amanah" diberikan oleh para pendiri desa sebagai pengingat akan pentingnya menjaga kepercayaan antar sesama warga dan alam sekitar. Selama berabad-abad, desa ini telah melewati berbagai transformasi, dari pusat perdagangan hasil bumi tradisional hingga kini menjadi desa digital percontohan yang tetap memegang teguh nilai kearifan lokal. Gotong Royong bukan sekadar semboyan, melainkan detak jantung pembangunan kami.',
            'vision'           => 'Menjadikan Desa Amanah sebagai teladan pembangunan desa yang mandiri, inovatif, dan berkelanjutan melalui digitalisasi layanan publik dan pelestarian alam untuk kesejahteraan seluruh warga.',
            'mission'          => "1. Meningkatkan kualitas layanan administrasi publik berbasis teknologi digital.\n2. Mengembangkan potensi ekonomi lokal melalui pemberdayaan UMKM dan sektor pariwisata.\n3. Melestarikan budaya dan kearifan lokal sebagai identitas desa.\n4. Mewujudkan tata kelola pemerintahan yang transparan dan akuntabel.\n5. Meningkatkan kesejahteraan warga melalui program pembangunan yang merata dan berkeadilan.",
        ]);
    }
}