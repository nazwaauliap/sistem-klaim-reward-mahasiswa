<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SikaremaDummySeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Hak Akses
        |--------------------------------------------------------------------------
        */
        DB::table('hak_akses')->updateOrInsert(
            ['nama_akses' => 'Admin'],
            [
                'keterangan' => 'Mengelola data master, verifikasi prestasi, klaim reward, pencairan reward, dan laporan.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('hak_akses')->updateOrInsert(
            ['nama_akses' => 'Mahasiswa'],
            [
                'keterangan' => 'Mengajukan prestasi, melihat status verifikasi, dan mengajukan klaim reward.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $adminAkses = DB::table('hak_akses')->where('nama_akses', 'Admin')->first();
        $mahasiswaAkses = DB::table('hak_akses')->where('nama_akses', 'Mahasiswa')->first();

        /*
        |--------------------------------------------------------------------------
        | Data Mahasiswa
        |--------------------------------------------------------------------------
        */
        $mahasiswaData = [
            [
                'nim' => '2455201110040',
                'nama' => 'Jiraiaya',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Banjarmasin',
                'tanggal_lahir' => '2007-06-12',
                'alamat' => 'Desa Hokage',
                'no_hp' => '081234567890',
                'email' => 'lalala@gmail.com',
                'program_studi' => 'Teknik Informatika',
                'fakultas' => 'Fakultas Teknik',
                'angkatan' => '2024',
                'semester' => 4,
                'kelas' => 'TI 4A',
                'status_mahasiswa' => 'Aktif',
            ],
            [
                'nim' => '2455201110017',
                'nama' => 'Nazwa Aulia Putri',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Banjarmasin',
                'tanggal_lahir' => '2006-08-14',
                'alamat' => 'Banjarmasin',
                'no_hp' => '082112345678',
                'email' => 'nazwa@sikarema.test',
                'program_studi' => 'Teknik Informatika',
                'fakultas' => 'Fakultas Teknik',
                'angkatan' => '2024',
                'semester' => 4,
                'kelas' => 'TI 4A',
                'status_mahasiswa' => 'Aktif',
            ],
            [
                'nim' => '2455201110021',
                'nama' => 'Rizky Ramadhan',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Banjarbaru',
                'tanggal_lahir' => '2005-12-02',
                'alamat' => 'Banjarbaru',
                'no_hp' => '083145678901',
                'email' => 'rizky@sikarema.test',
                'program_studi' => 'Sistem Informasi',
                'fakultas' => 'Fakultas Teknik',
                'angkatan' => '2024',
                'semester' => 4,
                'kelas' => 'SI 4A',
                'status_mahasiswa' => 'Aktif',
            ],
            [
                'nim' => '2455201110033',
                'nama' => 'Salsabila Putri',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Martapura',
                'tanggal_lahir' => '2006-04-22',
                'alamat' => 'Martapura',
                'no_hp' => '085212345111',
                'email' => 'salsa@sikarema.test',
                'program_studi' => 'Teknik Informatika',
                'fakultas' => 'Fakultas Teknik',
                'angkatan' => '2024',
                'semester' => 4,
                'kelas' => 'TI 4B',
                'status_mahasiswa' => 'Aktif',
            ],
            [
                'nim' => '2455201110055',
                'nama' => 'Ahmad Fauzan',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Kandangan',
                'tanggal_lahir' => '2005-10-09',
                'alamat' => 'Kandangan',
                'no_hp' => '087812345222',
                'email' => 'fauzan@sikarema.test',
                'program_studi' => 'Teknik Informatika',
                'fakultas' => 'Fakultas Teknik',
                'angkatan' => '2024',
                'semester' => 4,
                'kelas' => 'TI 4A',
                'status_mahasiswa' => 'Aktif',
            ],
        ];

        foreach ($mahasiswaData as $data) {
            DB::table('mahasiswas')->updateOrInsert(
                ['nim' => $data['nim']],
                $data
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Kategori Prestasi
        |--------------------------------------------------------------------------
        */
        $kategoriData = [
            ['nama_kategori' => 'Akademik', 'deskripsi' => 'Prestasi yang berkaitan dengan bidang akademik, penelitian, karya tulis, dan kompetisi ilmiah.'],
            ['nama_kategori' => 'Non-Akademik', 'deskripsi' => 'Prestasi di luar bidang akademik seperti kewirausahaan, kepemimpinan, dan kegiatan umum lainnya.'],
            ['nama_kategori' => 'Olahraga', 'deskripsi' => 'Prestasi dalam bidang olahraga baik individu maupun tim.'],
            ['nama_kategori' => 'Seni', 'deskripsi' => 'Prestasi dalam bidang seni, budaya, musik, desain, tari, atau kreativitas.'],
            ['nama_kategori' => 'Organisasi', 'deskripsi' => 'Prestasi yang diperoleh melalui kegiatan organisasi, kepemimpinan, dan forum mahasiswa.'],
        ];

        foreach ($kategoriData as $data) {
            DB::table('kategori_prestasis')->updateOrInsert(
                ['nama_kategori' => $data['nama_kategori']],
                array_merge($data, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Tingkat Prestasi
        |--------------------------------------------------------------------------
        */
        $tingkatData = [
            ['nama_tingkat' => 'Kampus', 'deskripsi' => 'Prestasi pada tingkat internal kampus.'],
            ['nama_tingkat' => 'Kabupaten/Kota', 'deskripsi' => 'Prestasi pada tingkat kabupaten atau kota.'],
            ['nama_tingkat' => 'Provinsi', 'deskripsi' => 'Prestasi pada tingkat provinsi.'],
            ['nama_tingkat' => 'Nasional', 'deskripsi' => 'Prestasi pada tingkat nasional.'],
            ['nama_tingkat' => 'Internasional', 'deskripsi' => 'Prestasi pada tingkat internasional.'],
        ];

        foreach ($tingkatData as $data) {
            DB::table('tingkat_prestasis')->updateOrInsert(
                ['nama_tingkat' => $data['nama_tingkat']],
                array_merge($data, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Periode Klaim
        |--------------------------------------------------------------------------
        */
        DB::table('periode_klaims')->updateOrInsert(
            ['nama_periode' => 'Semester Genap 2025/2026 Periode 1'],
            [
                'semester' => 'Genap',
                'tahun_akademik' => '2025/2026',
                'periode_ke' => 1,
                'tanggal_mulai' => '2026-05-01',
                'tanggal_selesai' => '2026-05-31',
                'status' => 'Dibuka',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('periode_klaims')->updateOrInsert(
            ['nama_periode' => 'Semester Ganjil 2025/2026 Periode 1'],
            [
                'semester' => 'Ganjil',
                'tahun_akademik' => '2025/2026',
                'periode_ke' => 1,
                'tanggal_mulai' => '2025-11-01',
                'tanggal_selesai' => '2025-11-30',
                'status' => 'Ditutup',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Jenis Reward
        |--------------------------------------------------------------------------
        */
        $rewardData = [
            ['tingkat' => 'Kampus', 'nama_reward' => 'Reward Tingkat Kampus', 'nominal' => 100000, 'keterangan' => 'Reward untuk prestasi tingkat kampus.'],
            ['tingkat' => 'Kabupaten/Kota', 'nama_reward' => 'Reward Tingkat Kabupaten/Kota', 'nominal' => 200000, 'keterangan' => 'Reward untuk prestasi tingkat kabupaten atau kota.'],
            ['tingkat' => 'Provinsi', 'nama_reward' => 'Reward Tingkat Provinsi', 'nominal' => 300000, 'keterangan' => 'Reward untuk prestasi tingkat provinsi.'],
            ['tingkat' => 'Nasional', 'nama_reward' => 'Reward Tingkat Nasional', 'nominal' => 500000, 'keterangan' => 'Reward untuk prestasi tingkat nasional.'],
            ['tingkat' => 'Internasional', 'nama_reward' => 'Reward Tingkat Internasional', 'nominal' => 1000000, 'keterangan' => 'Reward untuk prestasi tingkat internasional.'],
        ];

        foreach ($rewardData as $data) {
            $tingkat = DB::table('tingkat_prestasis')->where('nama_tingkat', $data['tingkat'])->first();

            if ($tingkat) {
                DB::table('jenis_rewards')->updateOrInsert(
                    ['nama_reward' => $data['nama_reward']],
                    [
                        'id_tingkat' => $tingkat->id_tingkat,
                        'nominal' => $data['nominal'],
                        'keterangan' => $data['keterangan'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Users Login
        |--------------------------------------------------------------------------
        */
        $mahasiswaPertama = DB::table('mahasiswas')->where('email', 'nazwa@sikarema.test')->first();

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

        if ($mahasiswaAkses && $mahasiswaPertama) {
            DB::table('users')->updateOrInsert(
                ['email' => 'mahasiswa@sikarema.test'],
                [
                    'id_akses' => $mahasiswaAkses->id_akses,
                    'id_mhs' => $mahasiswaPertama->id_mhs,
                    'name' => $mahasiswaPertama->nama,
                    'password' => Hash::make('password'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Prestasi Mahasiswa
        |--------------------------------------------------------------------------
        */
        $prestasiData = [
            [
                'nim' => '2455201110017',
                'kategori' => 'Akademik',
                'tingkat' => 'Nasional',
                'nama_kegiatan' => 'Lomba Karya Tulis Ilmiah Nasional',
                'penyelenggara' => 'Universitas Negeri Indonesia',
                'tanggal_kegiatan' => '2026-04-15',
                'juara' => 'Juara 2',
                'status_verifikasi' => 'Terverifikasi',
            ],
            [
                'nim' => '2455201110040',
                'kategori' => 'Olahraga',
                'tingkat' => 'Provinsi',
                'nama_kegiatan' => 'Kejuaraan Badminton Mahasiswa Provinsi',
                'penyelenggara' => 'Dinas Pemuda dan Olahraga',
                'tanggal_kegiatan' => '2026-03-20',
                'juara' => 'Juara 1',
                'status_verifikasi' => 'Terverifikasi',
            ],
            [
                'nim' => '2455201110033',
                'kategori' => 'Seni',
                'tingkat' => 'Kampus',
                'nama_kegiatan' => 'Festival Seni Mahasiswa Kampus',
                'penyelenggara' => 'BEM Universitas',
                'tanggal_kegiatan' => '2026-02-10',
                'juara' => 'Juara 3',
                'status_verifikasi' => 'Menunggu',
            ],
            [
                'nim' => '2455201110021',
                'kategori' => 'Non-Akademik',
                'tingkat' => 'Kabupaten/Kota',
                'nama_kegiatan' => 'Kompetisi Kewirausahaan Mahasiswa',
                'penyelenggara' => 'Pemerintah Kota Banjarmasin',
                'tanggal_kegiatan' => '2026-01-25',
                'juara' => 'Finalis',
                'status_verifikasi' => 'Revisi',
            ],
            [
                'nim' => '2455201110055',
                'kategori' => 'Organisasi',
                'tingkat' => 'Internasional',
                'nama_kegiatan' => 'International Student Leadership Forum',
                'penyelenggara' => 'ASEAN Student Network',
                'tanggal_kegiatan' => '2026-05-05',
                'juara' => 'Best Delegate',
                'status_verifikasi' => 'Ditolak',
            ],
        ];

        foreach ($prestasiData as $data) {
            $mahasiswa = DB::table('mahasiswas')->where('nim', $data['nim'])->first();
            $kategori = DB::table('kategori_prestasis')->where('nama_kategori', $data['kategori'])->first();
            $tingkat = DB::table('tingkat_prestasis')->where('nama_tingkat', $data['tingkat'])->first();

            if ($mahasiswa && $kategori && $tingkat) {
                DB::table('prestasi_mahasiswas')->updateOrInsert(
                    ['nama_kegiatan' => $data['nama_kegiatan']],
                    [
                        'id_mhs' => $mahasiswa->id_mhs,
                        'id_kategori' => $kategori->id_kategori,
                        'id_tingkat' => $tingkat->id_tingkat,
                        'penyelenggara' => $data['penyelenggara'],
                        'tanggal_kegiatan' => $data['tanggal_kegiatan'],
                        'juara' => $data['juara'],
                        'file_sertifikat' => null,
                        'status_verifikasi' => $data['status_verifikasi'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Klaim Reward
        |--------------------------------------------------------------------------
        */
        $periodeDibuka = DB::table('periode_klaims')->where('status', 'Dibuka')->first();

        $prestasiNasional = DB::table('prestasi_mahasiswas')
            ->where('nama_kegiatan', 'Lomba Karya Tulis Ilmiah Nasional')
            ->first();

        $rewardNasional = DB::table('jenis_rewards')
            ->where('nama_reward', 'Reward Tingkat Nasional')
            ->first();

        if ($prestasiNasional && $periodeDibuka && $rewardNasional) {
            DB::table('klaim_rewards')->updateOrInsert(
                [
                    'id_prestasi' => $prestasiNasional->id_prestasi,
                    'id_periode' => $periodeDibuka->id_periode,
                ],
                [
                    'id_reward' => $rewardNasional->id_reward,
                    'tanggal_pengajuan' => now()->toDateString(),
                    'status_klaim' => 'Disetujui',
                    'catatan' => 'Klaim reward disetujui karena prestasi valid.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        $prestasiProvinsi = DB::table('prestasi_mahasiswas')
            ->where('nama_kegiatan', 'Kejuaraan Badminton Mahasiswa Provinsi')
            ->first();

        $rewardProvinsi = DB::table('jenis_rewards')
            ->where('nama_reward', 'Reward Tingkat Provinsi')
            ->first();

        if ($prestasiProvinsi && $periodeDibuka && $rewardProvinsi) {
            DB::table('klaim_rewards')->updateOrInsert(
                [
                    'id_prestasi' => $prestasiProvinsi->id_prestasi,
                    'id_periode' => $periodeDibuka->id_periode,
                ],
                [
                    'id_reward' => $rewardProvinsi->id_reward,
                    'tanggal_pengajuan' => now()->toDateString(),
                    'status_klaim' => 'Menunggu',
                    'catatan' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Pencairan Reward
        |--------------------------------------------------------------------------
        */
        $klaimDisetujui = DB::table('klaim_rewards')
            ->where('status_klaim', 'Disetujui')
            ->first();

        if ($klaimDisetujui) {
            DB::table('pencairan_rewards')->updateOrInsert(
                ['id_klaim' => $klaimDisetujui->id_klaim],
                [
                    'nominal_dicairkan' => 500000,
                    'tanggal_pencairan' => now()->toDateString(),
                    'status_pencairan' => 'Selesai',
                    'keterangan' => 'Reward telah dicairkan ke mahasiswa.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}