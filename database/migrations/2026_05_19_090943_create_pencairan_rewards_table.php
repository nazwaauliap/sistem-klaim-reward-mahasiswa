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
        Schema::create('pencairan_rewards', function (Blueprint $table) {
            $table->id('id_pencairan');
            $table->unsignedBigInteger('id_klaim');
            $table->decimal('nominal_dicairkan', 12, 2);
            $table->date('tanggal_pencairan');
            $table->enum('status_pencairan', ['Diproses', 'Selesai'])->default('Diproses');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_klaim')
                ->references('id_klaim')
                ->on('klaim_rewards')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencairan_rewards');
    }
};
