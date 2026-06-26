<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $adminUser = User::where('email', 'konten@desa-amanah.id')->first();

        $newsData = [
            [
                'title'        => 'Peluncuran Inisiatif Ketahanan Pangan Desa 2025',
                'slug'         => 'peluncuran-inisiatif-ketahanan-pangan-desa-2025',
                'category'     => 'Program Unggulan',
                'excerpt'      => 'Pemerintah desa memperkenalkan program taman komunitas untuk menjamin ketersediaan pangan mandiri bagi seluruh warga.',
                'content'      => '<p>Pemerintah Desa Amanah resmi meluncurkan Program Ketahanan Pangan 2025 yang bertujuan untuk memastikan ketersediaan pangan mandiri bagi seluruh 4.520 warga desa.</p><p>Program ini mencakup pembangunan 12 taman komunitas di setiap dusun, pelatihan pertanian organik untuk 300 petani, serta pengembangan sistem irigasi modern yang terintegrasi dengan teknologi sensor kelembaban tanah.</p><p>Kepala Desa H. Ahmad Fauzi menyatakan bahwa program ini merupakan langkah konkret menuju kemandirian pangan desa yang berkelanjutan.</p>',
                'status'       => 'published',
                'published_at' => '2024-10-12 08:00:00',
            ],
            [
                'title'        => 'Workshop Literasi Digital bagi Pelaku UMKM Desa',
                'slug'         => 'workshop-literasi-digital-umkm-desa',
                'category'     => 'Pembangunan',
                'excerpt'      => 'Puluhan pedagang lokal mengikuti pelatihan pemasaran digital untuk memperluas jangkauan produk khas desa ke pasar nasional.',
                'content'      => '<p>Sebanyak 67 pelaku UMKM Desa Amanah mengikuti Workshop Literasi Digital yang diselenggarakan bekerja sama dengan Dinas Koperasi dan UKM Kabupaten Makmur.</p><p>Materi yang diberikan meliputi pembuatan toko online di marketplace, strategi pemasaran media sosial, fotografi produk menggunakan smartphone, serta pengelolaan keuangan digital.</p><p>Para peserta sangat antusias karena kini produk unggulan desa seperti Kopi Robusta Amanah dan Anyaman Bambu sudah bisa dipesan dari seluruh penjuru Indonesia.</p>',
                'status'       => 'published',
                'published_at' => '2024-10-08 09:00:00',
            ],
            [
                'title'        => 'Festival Harmoni Alam: Merayakan Panen Raya',
                'slug'         => 'festival-harmoni-alam-merayakan-panen-raya',
                'category'     => 'Budaya',
                'excerpt'      => 'Perayaan tahunan sebagai wujud syukur atas hasil bumi yang melimpah dan tradisi leluhur yang tetap terjaga.',
                'content'      => '<p>Festival Harmoni Alam 2024 kembali diselenggarakan dengan meriah di Lapangan Desa Amanah. Ribuan warga dan wisatawan dari berbagai daerah hadir untuk menyaksikan beragam pertunjukan seni budaya lokal.</p><p>Festival ini menampilkan tari tradisional, pameran produk UMKM, lomba memasak masakan khas desa, serta pasar rakyat yang menjual hasil bumi segar langsung dari petani.</p>',
                'status'       => 'published',
                'published_at' => '2024-10-05 07:00:00',
            ],
            [
                'title'        => 'Pembangunan Jembatan Penghubung Dusun Selesai Tepat Waktu',
                'slug'         => 'pembangunan-jembatan-penghubung-dusun-selesai',
                'category'     => 'Infrastruktur',
                'excerpt'      => 'Jembatan sepanjang 45 meter yang menghubungkan Dusun Wetan dan Dusun Kulon kini resmi beroperasi.',
                'content'      => '<p>Proyek pembangunan Jembatan Amanah Jaya sepanjang 45 meter yang menghubungkan Dusun Wetan dan Dusun Kulon telah selesai dikerjakan tepat waktu dan sesuai anggaran.</p><p>Jembatan ini menggunakan dana desa sebesar Rp 380 juta dan dikerjakan oleh kontraktor lokal dengan melibatkan 24 tenaga kerja warga desa setempat.</p>',
                'status'       => 'published',
                'published_at' => '2024-09-28 10:00:00',
            ],
            [
                'title'        => 'Posyandu Lansia Hadir di Setiap Dusun',
                'slug'         => 'posyandu-lansia-hadir-di-setiap-dusun',
                'category'     => 'Kesehatan',
                'excerpt'      => 'Desa Amanah kini memiliki 6 Posyandu Lansia yang tersebar di seluruh dusun untuk meningkatkan layanan kesehatan warga.',
                'content'      => '<p>Dalam rangka meningkatkan kualitas kesehatan warga lanjut usia, Pemerintah Desa Amanah bekerja sama dengan Puskesmas Kecamatan Lestari meresmikan 6 Posyandu Lansia yang kini tersebar di seluruh dusun.</p><p>Setiap posyandu dilengkapi dengan alat pemeriksaan tekanan darah, gula darah, dan konsultasi gizi. Jadwal pemeriksaan dilaksanakan setiap dua minggu sekali.</p>',
                'status'       => 'published',
                'published_at' => '2024-09-15 08:00:00',
            ],
            [
                'title'        => 'Rencana Pengembangan Ekowisata Sungai Bening 2025',
                'slug'         => 'rencana-pengembangan-ekowisata-sungai-bening-2025',
                'category'     => 'Pariwisata',
                'excerpt'      => 'Desa Amanah menyiapkan paket ekowisata Sungai Bening sebagai destinasi unggulan baru yang ramah lingkungan.',
                'content'      => '<p>Pemerintah Desa Amanah tengah menyusun masterplan pengembangan kawasan ekowisata Sungai Bening yang akan menjadi destinasi wisata alam unggulan baru di Kabupaten Makmur.</p><p>Konsep ekowisata yang diusung mengedepankan pelestarian lingkungan sungai, pemberdayaan pemandu wisata lokal, serta pengembangan paket wisata edukasi tentang ekosistem sungai bagi pelajar.</p>',
                'status'       => 'draft',
                'published_at' => null,
            ],
        ];

        foreach ($newsData as $news) {
            News::create(array_merge($news, ['user_id' => $adminUser->id]));
        }
    }
}