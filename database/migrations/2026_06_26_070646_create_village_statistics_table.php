<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('village_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('label');        // Contoh: "Jumlah Penduduk"
            $table->string('value');        // Contoh: "3.240"
            $table->string('unit')->nullable(); // Contoh: "Jiwa", "Ha"
            $table->string('icon');         // Nama icon Material Symbols
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('village_statistics');
    }
};