<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('periode_klaims', function (Blueprint $table) {
            $table->id('id_periode');
            $table->string('nama_periode');
            $table->enum('semester', ['Ganjil', 'Genap']);
            $table->string('tahun_akademik');
            $table->integer('periode_ke');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('status', ['Belum Dibuka', 'Dibuka', 'Ditutup'])->default('Belum Dibuka');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode_klaims');
    }
};
