<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_akses')->nullable()->after('id');
            $table->unsignedBigInteger('id_mhs')->nullable()->after('id_akses');

            $table->foreign('id_akses')
                ->references('id_akses')
                ->on('hak_akses')
                ->onDelete('set null');

            $table->foreign('id_mhs')
                ->references('id_mhs')
                ->on('mahasiswas')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_akses']);
            $table->dropForeign(['id_mhs']);

            $table->dropColumn(['id_akses', 'id_mhs']);
        });
    }
};