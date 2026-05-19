<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAccountSeeder extends Seeder
{
    public function run(): void
    {
        $adminAkses = DB::table('hak_akses')
            ->where('nama_akses', 'Admin')
            ->first();

        $mahasiswaAkses = DB::table('hak_akses')
            ->where('nama_akses', 'Mahasiswa')
            ->first();

        $mahasiswa = DB::table('mahasiswas')->first();

        if ($adminAkses) {
            DB::table('users')->updateOrInsert(
                ['email' => 'admin@sikarema.test'],
                [
                    'id_akses' => $adminAkses->id_akses,
                    'id_mhs' => null,
                    'name' => 'Admin SIKAREMA',
                    'password' => Hash::make('password'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        if ($mahasiswaAkses && $mahasiswa) {
            DB::table('users')->updateOrInsert(
                ['email' => 'mahasiswa@sikarema.test'],
                [
                    'id_akses' => $mahasiswaAkses->id_akses,
                    'id_mhs' => $mahasiswa->id_mhs,
                    'name' => $mahasiswa->nama,
                    'password' => Hash::make('password'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}