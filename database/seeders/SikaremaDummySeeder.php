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
        $hakAksesData = [
            [
                'nama_akses' => 'Mahasiswa',
                'keterangan' => 'Mengajukan prestasi, melihat status verifikasi, dan mengajukan klaim reward.',
            ],
            [
                'nama_akses' => 'Dosen',
                'keterangan' => 'Melihat dan memantau data prestasi mahasiswa sesuai kebutuhan akademik.',
            ],
            [
                'nama_akses' => 'Admin',
                'keterangan' => 'Mengelola data master, memverifikasi prestasi, memproses klaim reward, mengelola pencairan reward, dan melihat data hak akses.',
            ],
            [
                'nama_akses' => 'Super Admin',
                'keterangan' => 'Mengelola seluruh sistem, termasuk data hak akses dan pengaturan user.',
            ],
        ];

        foreach ($hakAksesData as $data) {
            DB::table('hak_akses')->updateOrInsert(
                ['nama_akses' => $data['nama_akses']],
                [
                    'keterangan' => $data['keterangan'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        $mahasiswaAkses = DB::table('hak_akses')->where('nama_akses', 'Mahasiswa')->first();
        $dosenAkses = DB::table('hak_akses')->where('nama_akses', 'Dosen')->first();
        $adminAkses = DB::table('hak_akses')->where('nama_akses', 'Admin')->first();
        $superAdminAkses = DB::table('hak_akses')->where('nama_akses', 'Super Admin')->first();

/*
|--------------------------------------------------------------------------
| Data Mahasiswa
|--------------------------------------------------------------------------
*/
$mahasiswaData = [
    [
        'nim' => '2155201110011',
        'nama' => 'DICKI PRASTIA PAUZI',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Barabai',
        'tanggal_lahir' => '2001-08-12',
        'alamat' => 'Jl. Pangeran Antasari, Banjarmasin',
        'no_hp' => '081251110001',
        'email' => '2155201110011@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2021',
        'semester' => 10,
        'kelas' => 'TI 10A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110002',
        'nama' => 'AKMAL MAULANA YUSUF',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Banjarmasin',
        'tanggal_lahir' => '2005-03-14',
        'alamat' => 'Jl. A. Yani Km. 5, Banjarmasin',
        'no_hp' => '081251110002',
        'email' => '2455201110002@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110003',
        'nama' => 'HALIS ANNISA',
        'jenis_kelamin' => 'Perempuan',
        'tempat_lahir' => 'Banjarbaru',
        'tanggal_lahir' => '2005-07-21',
        'alamat' => 'Jl. Karang Anyar, Banjarbaru',
        'no_hp' => '081251110003',
        'email' => '2455201110003@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110004',
        'nama' => 'HARY NUR AFANDI',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Martapura',
        'tanggal_lahir' => '2005-11-02',
        'alamat' => 'Jl. Sekumpul, Martapura',
        'no_hp' => '081251110004',
        'email' => '2455201110004@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110005',
        'nama' => 'I DEWA GEDE ARYA PRAMEISA',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Denpasar',
        'tanggal_lahir' => '2005-05-18',
        'alamat' => 'Jl. Veteran, Banjarmasin',
        'no_hp' => '081251110005',
        'email' => '2455201110005@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110006',
        'nama' => 'LUTHFI AHMAD FAHREZI',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Banjarmasin',
        'tanggal_lahir' => '2005-09-10',
        'alamat' => 'Jl. Sultan Adam, Banjarmasin',
        'no_hp' => '081251110006',
        'email' => '2455201110006@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110007',
        'nama' => 'LUTHFIANA SAFITRI',
        'jenis_kelamin' => 'Perempuan',
        'tempat_lahir' => 'Banjarmasin',
        'tanggal_lahir' => '2005-12-04',
        'alamat' => 'Jl. Cemara Raya, Banjarmasin',
        'no_hp' => '081251110007',
        'email' => '2455201110007@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110009',
        'nama' => 'MOCHAMMAD SYAHID FARIZ ABQARI',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Kandangan',
        'tanggal_lahir' => '2005-06-28',
        'alamat' => 'Jl. Gatot Subroto, Banjarmasin',
        'no_hp' => '081251110009',
        'email' => '2455201110009@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110010',
        'nama' => 'MUHAMMAD FAJAR AULIA',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Pelaihari',
        'tanggal_lahir' => '2005-02-17',
        'alamat' => 'Jl. Pramuka, Banjarmasin',
        'no_hp' => '081251110010',
        'email' => '2455201110010@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110012',
        'nama' => 'MUHAMMAD RYAN HIDAYAT',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Amuntai',
        'tanggal_lahir' => '2005-04-09',
        'alamat' => 'Jl. Kayu Tangi, Banjarmasin',
        'no_hp' => '081251110012',
        'email' => '2455201110012@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110013',
        'nama' => 'MUHAMMAD SYAFIQ HUSIN',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Banjarmasin',
        'tanggal_lahir' => '2005-01-23',
        'alamat' => 'Jl. Belitung Darat, Banjarmasin',
        'no_hp' => '081251110013',
        'email' => '2455201110013@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110014',
        'nama' => 'MUHAMMAD SYAHID FADHILLAH',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Rantau',
        'tanggal_lahir' => '2005-08-30',
        'alamat' => 'Jl. Kelayan A, Banjarmasin',
        'no_hp' => '081251110014',
        'email' => '2455201110014@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110015',
        'nama' => 'MUHAMMAD SYARIF',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Marabahan',
        'tanggal_lahir' => '2005-10-15',
        'alamat' => 'Jl. Kuin Utara, Banjarmasin',
        'no_hp' => '081251110015',
        'email' => '2455201110015@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110016',
        'nama' => 'NANDA SYALWA NAZELLA',
        'jenis_kelamin' => 'Perempuan',
        'tempat_lahir' => 'Banjarmasin',
        'tanggal_lahir' => '2005-07-07',
        'alamat' => 'Jl. Kampung Melayu, Banjarmasin',
        'no_hp' => '081251110016',
        'email' => '2455201110016@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110017',
        'nama' => 'NAZWA AULIA PUTRI',
        'jenis_kelamin' => 'Perempuan',
        'tempat_lahir' => 'Banjarbaru',
        'tanggal_lahir' => '2005-09-25',
        'alamat' => 'Jl. Trikora, Banjarbaru',
        'no_hp' => '081251110017',
        'email' => '2455201110017@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110018',
        'nama' => 'NOR MAYANTI',
        'jenis_kelamin' => 'Perempuan',
        'tempat_lahir' => 'Martapura',
        'tanggal_lahir' => '2005-11-19',
        'alamat' => 'Jl. Ahmad Yani, Martapura',
        'no_hp' => '081251110018',
        'email' => '2455201110018@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110019',
        'nama' => 'NUR AISYAH',
        'jenis_kelamin' => 'Perempuan',
        'tempat_lahir' => 'Banjarmasin',
        'tanggal_lahir' => '2005-06-11',
        'alamat' => 'Jl. Sungai Andai, Banjarmasin',
        'no_hp' => '081251110019',
        'email' => '2455201110019@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110020',
        'nama' => 'PENDRI MIKOLA',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Tanjung',
        'tanggal_lahir' => '2005-04-26',
        'alamat' => 'Jl. HKSN, Banjarmasin',
        'no_hp' => '081251110020',
        'email' => '2455201110020@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110021',
        'nama' => 'RAIHAN',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Banjarmasin',
        'tanggal_lahir' => '2005-12-13',
        'alamat' => 'Jl. Teluk Dalam, Banjarmasin',
        'no_hp' => '081251110021',
        'email' => '2455201110021@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110022',
        'nama' => 'RIANTI',
        'jenis_kelamin' => 'Perempuan',
        'tempat_lahir' => 'Kuala Kapuas',
        'tanggal_lahir' => '2005-05-05',
        'alamat' => 'Jl. Handil Bakti, Barito Kuala',
        'no_hp' => '081251110022',
        'email' => '2455201110022@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110023',
        'nama' => 'RUDI GUNAWAN',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Kotabaru',
        'tanggal_lahir' => '2005-02-22',
        'alamat' => 'Jl. Bumi Mas Raya, Banjarmasin',
        'no_hp' => '081251110023',
        'email' => '2455201110023@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110024',
        'nama' => 'SITI HIDAYATUZ ZUHRO',
        'jenis_kelamin' => 'Perempuan',
        'tempat_lahir' => 'Banjarmasin',
        'tanggal_lahir' => '2005-09-03',
        'alamat' => 'Jl. Banua Anyar, Banjarmasin',
        'no_hp' => '081251110024',
        'email' => '2455201110024@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110025',
        'nama' => 'VIONA WINOLA SUPRAPTO',
        'jenis_kelamin' => 'Perempuan',
        'tempat_lahir' => 'Palangka Raya',
        'tanggal_lahir' => '2005-01-29',
        'alamat' => 'Jl. Cemara Ujung, Banjarmasin',
        'no_hp' => '081251110025',
        'email' => '2455201110025@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110026',
        'nama' => 'YUDHA MAULANA DARHAM',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Banjarmasin',
        'tanggal_lahir' => '2005-03-31',
        'alamat' => 'Jl. Perdagangan, Banjarmasin',
        'no_hp' => '081251110026',
        'email' => '2455201110026@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110027',
        'nama' => 'ZAINABUL ASKYAH',
        'jenis_kelamin' => 'Perempuan',
        'tempat_lahir' => 'Banjarmasin',
        'tanggal_lahir' => '2005-08-08',
        'alamat' => 'Jl. Pekapuran Raya, Banjarmasin',
        'no_hp' => '081251110027',
        'email' => '2455201110027@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110028',
        'nama' => 'MUHAMMAD AGUS YULIANSYAH',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Banjarmasin',
        'tanggal_lahir' => '2005-06-06',
        'alamat' => 'Jl. Manggis, Banjarmasin',
        'no_hp' => '081251110028',
        'email' => '2455201110028@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110030',
        'nama' => 'GILANG HERNAWAN SALEM',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Sampit',
        'tanggal_lahir' => '2005-10-10',
        'alamat' => 'Jl. Brigjen H. Hasan Basri, Banjarmasin',
        'no_hp' => '081251110030',
        'email' => '2455201110030@sikarema.test',
        'program_studi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknik',
        'angkatan' => '2024',
        'semester' => 4,
        'kelas' => 'TI 4A',
        'status_mahasiswa' => 'Aktif',
    ],
    [
        'nim' => '2455201110031',
        'nama' => 'SAHIDATUL ASIAH',
        'jenis_kelamin' => 'Perempuan',
        'tempat_lahir' => 'Banjarmasin',
        'tanggal_lahir' => '2005-12-20',
        'alamat' => 'Jl. Alalak Selatan, Banjarmasin',
        'no_hp' => '081251110031',
        'email' => '2455201110031@sikarema.test',
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
            [
                'nama_kategori' => 'Akademik',
                'deskripsi' => 'Prestasi yang berkaitan dengan bidang akademik, penelitian, karya tulis, lomba ilmiah, dan kegiatan pembelajaran.',
            ],
            [
                'nama_kategori' => 'Non-Akademik',
                'deskripsi' => 'Prestasi di luar bidang akademik, seperti olahraga, seni, organisasi, kewirausahaan, kepemimpinan, dan kegiatan umum lainnya.',
            ],
        ];

        DB::table('kategori_prestasis')
            ->whereNotIn('nama_kategori', ['Akademik', 'Non-Akademik'])
            ->delete();

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
            [
                'nama_tingkat' => 'Kampus',
                'deskripsi' => 'Prestasi pada tingkat internal kampus.',
            ],
            [
                'nama_tingkat' => 'Kabupaten/Kota',
                'deskripsi' => 'Prestasi pada tingkat kabupaten atau kota.',
            ],
            [
                'nama_tingkat' => 'Provinsi',
                'deskripsi' => 'Prestasi pada tingkat provinsi.',
            ],
            [
                'nama_tingkat' => 'Nasional',
                'deskripsi' => 'Prestasi pada tingkat nasional.',
            ],
            [
                'nama_tingkat' => 'Internasional',
                'deskripsi' => 'Prestasi pada tingkat internasional.',
            ],
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
            [
                'tingkat' => 'Kampus',
                'nama_reward' => 'Reward Tingkat Kampus',
                'nominal' => 100000,
                'keterangan' => 'Reward untuk prestasi tingkat kampus.',
            ],
            [
                'tingkat' => 'Kabupaten/Kota',
                'nama_reward' => 'Reward Tingkat Kabupaten/Kota',
                'nominal' => 200000,
                'keterangan' => 'Reward untuk prestasi tingkat kabupaten atau kota.',
            ],
            [
                'tingkat' => 'Provinsi',
                'nama_reward' => 'Reward Tingkat Provinsi',
                'nominal' => 300000,
                'keterangan' => 'Reward untuk prestasi tingkat provinsi.',
            ],
            [
                'tingkat' => 'Nasional',
                'nama_reward' => 'Reward Tingkat Nasional',
                'nominal' => 500000,
                'keterangan' => 'Reward untuk prestasi tingkat nasional.',
            ],
            [
                'tingkat' => 'Internasional',
                'nama_reward' => 'Reward Tingkat Internasional',
                'nominal' => 1000000,
                'keterangan' => 'Reward untuk prestasi tingkat internasional.',
            ],
        ];

        foreach ($rewardData as $data) {
            $tingkat = DB::table('tingkat_prestasis')
                ->where('nama_tingkat', $data['tingkat'])
                ->first();

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
        $mahasiswaPertama = DB::table('mahasiswas')->first();

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

        if ($superAdminAkses) {
            DB::table('users')->updateOrInsert(
                ['email' => 'superadmin@sikarema.test'],
                [
                    'id_akses' => $superAdminAkses->id_akses,
                    'id_mhs' => null,
                    'name' => 'Super Admin SIKAREMA',
                    'password' => Hash::make('password'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        if ($dosenAkses) {
            DB::table('users')->updateOrInsert(
                ['email' => 'dosen@sikarema.test'],
                [
                    'id_akses' => $dosenAkses->id_akses,
                    'id_mhs' => null,
                    'name' => 'Dosen SIKAREMA',
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
                'kategori' => 'Non-Akademik',
                'tingkat' => 'Provinsi',
                'nama_kegiatan' => 'Kejuaraan Badminton Mahasiswa Provinsi',
                'penyelenggara' => 'Dinas Pemuda dan Olahraga',
                'tanggal_kegiatan' => '2026-03-20',
                'juara' => 'Juara 1',
                'status_verifikasi' => 'Terverifikasi',
            ],
            [
                'nim' => '2455201110033',
                'kategori' => 'Non-Akademik',
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
                'kategori' => 'Non-Akademik',
                'tingkat' => 'Internasional',
                'nama_kegiatan' => 'International Student Leadership Forum',
                'penyelenggara' => 'ASEAN Student Network',
                'tanggal_kegiatan' => '2026-05-05',
                'juara' => 'Best Delegate',
                'status_verifikasi' => 'Ditolak',
            ],
        ];

        foreach ($prestasiData as $data) {
            $mahasiswa = DB::table('mahasiswas')
                ->where('nim', $data['nim'])
                ->first();

            $kategori = DB::table('kategori_prestasis')
                ->where('nama_kategori', $data['kategori'])
                ->first();

            $tingkat = DB::table('tingkat_prestasis')
                ->where('nama_tingkat', $data['tingkat'])
                ->first();

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
        $periodeDibuka = DB::table('periode_klaims')
            ->where('status', 'Dibuka')
            ->first();

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