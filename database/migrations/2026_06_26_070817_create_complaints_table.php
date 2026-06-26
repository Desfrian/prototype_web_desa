<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complaint_category_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->string('sender_name');       // Nama pengirim
            $table->string('sender_phone');      // Nomor HP
            $table->string('sender_address')->nullable(); // Alamat/dusun
            $table->text('content');             // Isi pengaduan
            $table->enum('status', ['baru', 'diproses', 'selesai'])->default('baru');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};