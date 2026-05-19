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
        Schema::create('klaim_rewards', function (Blueprint $table) {
            $table->id('id_klaim');
            $table->unsignedBigInteger('id_prestasi');
            $table->unsignedBigInteger('id_periode');
            $table->unsignedBigInteger('id_reward');
            $table->date('tanggal_pengajuan');
            $table->enum('status_klaim', ['Menunggu', 'Disetujui', 'Ditolak'])->default('Menunggu');
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('id_prestasi')
                ->references('id_prestasi')
                ->on('prestasi_mahasiswas')
                ->onDelete('cascade');

            $table->foreign('id_periode')
                ->references('id_periode')
                ->on('periode_klaims')
                ->onDelete('cascade');

            $table->foreign('id_reward')
                ->references('id_reward')
                ->on('jenis_rewards')
                ->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klaim_rewards');
    }
};
