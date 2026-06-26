<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tourism_places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');          // Alam, Budaya, Ekowisata, dll
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('location')->nullable(); // Lokasi/alamat spesifik
            $table->boolean('is_featured')->default(false); // Tampil di bento grid?
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tourism_places');
    }
};