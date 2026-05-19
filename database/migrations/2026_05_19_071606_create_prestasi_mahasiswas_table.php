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
        Schema::create('prestasi_mahasiswas', function (Blueprint $table) {
            $table->id('id_prestasi');
            $table->unsignedBigInteger('id_mhs');
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_tingkat');
            $table->string('nama_kegiatan');
            $table->string('penyelenggara');
            $table->date('tanggal_kegiatan');
            $table->string('juara');
            $table->string('file_sertifikat')->nullable();
            $table->enum('status_verifikasi', ['Menunggu', 'Terverifikasi', 'Ditolak', 'Revisi'])->default('Menunggu');
            $table->timestamps();

            $table->foreign('id_mhs')->references('id_mhs')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori_prestasis')->onDelete('cascade');
            $table->foreign('id_tingkat')->references('id_tingkat')->on('tingkat_prestasis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi_mahasiswas');
    }
};
