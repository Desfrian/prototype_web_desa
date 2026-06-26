<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('village_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('village_name');        // Nama desa
            $table->string('subdistrict');         // Kecamatan
            $table->string('regency');             // Kabupaten
            $table->string('province');            // Provinsi
            $table->string('postal_code')->nullable();
            $table->text('history');               // Sejarah desa
            $table->text('vision');                // Visi
            $table->text('mission');               // Misi
            $table->text('description')->nullable(); // Deskripsi singkat
            $table->string('head_of_village');     // Nama kepala desa
            $table->year('established_year')->nullable(); // Tahun berdiri
            $table->string('hero_image')->nullable(); // Foto hero halaman profil
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('village_profiles');
    }
};