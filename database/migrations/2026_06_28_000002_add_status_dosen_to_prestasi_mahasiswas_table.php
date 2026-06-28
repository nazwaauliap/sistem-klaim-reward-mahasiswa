<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('prestasi_mahasiswas', function (Blueprint $table) {
            $table->string('status_dosen')->default('Menunggu')->after('status_verifikasi');
            $table->text('catatan_dosen')->nullable()->after('status_dosen');
        });
    }

    public function down()
    {
        Schema::table('prestasi_mahasiswas', function (Blueprint $table) {
            $table->dropColumn(['status_dosen', 'catatan_dosen']);
        });
    }
};
