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
        Schema::create('jenis_rewards', function (Blueprint $table) {
            $table->id('id_reward');
            $table->unsignedBigInteger('id_tingkat');
            $table->string('nama_reward');
            $table->decimal('nominal', 12, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_tingkat')
                ->references('id_tingkat')
                ->on('tingkat_prestasis')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_rewards');
    }
};
