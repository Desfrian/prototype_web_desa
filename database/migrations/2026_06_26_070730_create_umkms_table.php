<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // Nama produk/UMKM
            $table->string('category');          // Kerajinan, Kuliner, Wastra, dll
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('owner')->nullable(); // Nama pemilik UMKM
            $table->string('contact')->nullable(); // Nomor HP pemilik
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};