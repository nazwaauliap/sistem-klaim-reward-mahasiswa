# SIKAREMA - Sistem Pengajuan Prestasi dan Klaim Reward Mahasiswa

SIKAREMA adalah aplikasi berbasis web yang digunakan untuk mengelola pengajuan prestasi mahasiswa dan klaim reward. Sistem ini dibuat menggunakan Laravel dengan konsep MVC serta menerapkan proses CRUD pada data master dan transaksi.

Project ini dibuat untuk memenuhi tugas UTS Pemrograman Web 2 berdasarkan rancangan arsitektur website yang telah dibuat sebelumnya.

---

## Fitur Utama

### Admin

- Login admin
- Dashboard admin
- Mengelola data mahasiswa
- Mengelola hak akses
- Mengelola kategori prestasi
- Mengelola tingkat prestasi
- Mengelola periode klaim
- Mengelola jenis reward
- Melakukan verifikasi prestasi mahasiswa
- Memproses klaim reward mahasiswa
- Mencatat pencairan reward
- Melihat laporan berdasarkan periode klaim
- Logout admin

### Mahasiswa

- Login mahasiswa
- Dashboard mahasiswa
- Mengajukan prestasi
- Melihat daftar prestasi milik akun yang sedang login
- Melihat status verifikasi prestasi
- Mengajukan klaim reward berdasarkan prestasi yang sudah terverifikasi
- Melihat status klaim reward milik akun yang sedang login
- Logout mahasiswa

---

## Teknologi yang Digunakan

- Laravel
- PHP
- MySQL
- Blade Template
- Bootstrap
- Laragon
- Git dan GitHub

---

## Konsep MVC

Project SIKAREMA menggunakan konsep MVC Laravel, yaitu Model, View, dan Controller.

### Model

Model digunakan untuk menghubungkan aplikasi dengan tabel database.

Contoh model yang digunakan:

- `User.php`
- `Mahasiswa.php`
- `HakAkses.php`
- `KategoriPrestasi.php`
- `TingkatPrestasi.php`
- `PeriodeKlaim.php`
- `JenisReward.php`
- `PrestasiMahasiswa.php`
- `KlaimReward.php`
- `PencairanReward.php`

### View

View digunakan untuk menampilkan halaman website kepada pengguna.

Contoh view yang digunakan:

- `resources/views/auth/login.blade.php`
- `resources/views/layouts/admin.blade.php`
- `resources/views/layouts/mahasiswa.blade.php`
- `resources/views/mahasiswa/index.blade.php`
- `resources/views/prestasi-mahasiswa/index.blade.php`
- `resources/views/mahasiswa-panel/dashboard.blade.php`
- `resources/views/mahasiswa-panel/prestasi/index.blade.php`
- `resources/views/mahasiswa-panel/klaim-reward/index.blade.php`
- `resources/views/laporan/index.blade.php`

### Controller

Controller digunakan untuk mengatur proses data dari model ke view.

Contoh controller yang digunakan:

- `AuthController.php`
- `MahasiswaController.php`
- `HakAksesController.php`
- `KategoriPrestasiController.php`
- `TingkatPrestasiController.php`
- `PeriodeKlaimController.php`
- `JenisRewardController.php`
- `PrestasiMahasiswaController.php`
- `MahasiswaDashboardController.php`
- `MahasiswaPrestasiController.php`
- `MahasiswaKlaimRewardController.php`
- `AdminKlaimRewardController.php`
- `PencairanRewardController.php`
- `LaporanController.php`

---

## Proses CRUD

CRUD diterapkan pada beberapa data master dan transaksi.

### Contoh CRUD Data Mahasiswa

- **Create**: Admin menambahkan data mahasiswa.
- **Read**: Admin melihat daftar data mahasiswa.
- **Update**: Admin mengubah data mahasiswa.
- **Delete**: Admin menghapus data mahasiswa.

### Data yang Memiliki CRUD

- Data Mahasiswa
- Kategori Prestasi
- Tingkat Prestasi
- Periode Klaim
- Jenis Reward
- Pencairan Reward

---

## Alur Sistem

1. Mahasiswa login ke sistem.
2. Mahasiswa mengajukan prestasi.
3. Prestasi yang diajukan akan berstatus `Menunggu`.
4. Admin melakukan verifikasi prestasi.
5. Jika prestasi terverifikasi, mahasiswa dapat mengajukan klaim reward.
6. Admin memproses klaim reward.
7. Jika klaim disetujui, admin dapat mencatat pencairan reward.
8. Admin dapat melihat laporan berdasarkan periode klaim.

---

## Role Pengguna

Sistem memiliki dua role utama:

### Admin

Admin dapat mengelola data master, memverifikasi prestasi, memproses klaim reward, mencatat pencairan reward, dan melihat laporan.

### Mahasiswa

Mahasiswa dapat mengajukan prestasi, melihat prestasi miliknya sendiri, mengajukan klaim reward, dan melihat status klaim reward miliknya sendiri.

---

## Hak Akses

Sistem sudah menggunakan login dan role protection.

- Admin hanya dapat mengakses halaman admin.
- Mahasiswa hanya dapat mengakses halaman mahasiswa.
- Pengguna yang belum login akan diarahkan ke halaman login.
- Pengguna dengan role yang salah tidak dapat mengakses halaman yang bukan hak aksesnya.

---

## Struktur Menu

### Menu Admin

- Dashboard
- Data Mahasiswa
- Hak Akses
- Kategori Prestasi
- Tingkat Prestasi
- Periode Klaim
- Jenis Reward
- Verifikasi Prestasi
- Klaim Reward
- Pencairan Reward
- Laporan

### Menu Mahasiswa

- Dashboard Mahasiswa
- Ajukan Prestasi
- Prestasi Saya
- Klaim Reward

---

## Tabel Master

Tabel master yang digunakan dalam sistem:

- `mahasiswas`
- `hak_akses`
- `kategori_prestasis`
- `tingkat_prestasis`
- `periode_klaims`
- `jenis_rewards`
- `users`

---

## Tabel Transaksi

Tabel transaksi yang digunakan dalam sistem:

- `prestasi_mahasiswas`
- `klaim_rewards`
- `pencairan_rewards`

---

## Fitur Laporan

Admin dapat melihat laporan berdasarkan periode klaim.

Laporan menampilkan:

- Total mahasiswa
- Total prestasi
- Total klaim reward
- Total nominal dicairkan
- Status prestasi
- Status klaim reward
- Prestasi terbaru
- Klaim reward terbaru

---

## Instalasi Project

Clone repository:

```bash
git clone https://github.com/nazwaauliap/sistem-klaim-reward-mahasiswa.git
```

Masuk ke folder project:

```bash
cd nama-repository
```

Install dependency Laravel:

```bash
composer install
```

Copy file environment:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Atur konfigurasi database di file `.env`:

```env
DB_DATABASE=sikarema
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migration:

```bash
php artisan migrate
```

Jalankan seeder data dummy:

```bash
php artisan db:seed --class=SikaremaDummySeeder
```

Jalankan storage link:

```bash
php artisan storage:link
```

Jalankan server lokal:

```bash
php artisan serve
```

Buka aplikasi di browser:

```text
http://127.0.0.1:8000
```

---

## Akun Demo

### Admin

```text
Email    : admin@sikarema.test
Password : password
```

### Mahasiswa

```text
Email    : mahasiswa@sikarema.test
Password : password
```

---

## Cara Menjalankan Demo

### Demo Admin

1. Login menggunakan akun admin.
2. Buka dashboard admin.
3. Tunjukkan data master seperti Data Mahasiswa, Kategori Prestasi, Tingkat Prestasi, Periode Klaim, dan Jenis Reward.
4. Tunjukkan proses CRUD pada salah satu data, misalnya Data Mahasiswa.
5. Buka Verifikasi Prestasi.
6. Ubah status prestasi mahasiswa.
7. Buka Klaim Reward.
8. Proses klaim reward mahasiswa.
9. Buka Pencairan Reward.
10. Tambahkan data pencairan reward.
11. Buka Laporan dan filter berdasarkan periode klaim.

### Demo Mahasiswa

1. Login menggunakan akun mahasiswa.
2. Buka dashboard mahasiswa.
3. Ajukan prestasi.
4. Lihat data pada menu Prestasi Saya.
5. Jika prestasi sudah terverifikasi, ajukan klaim reward.
6. Lihat status klaim reward pada menu Klaim Reward.

---

## Catatan Deployment

Project Laravel ini tidak dapat dijalankan langsung menggunakan GitHub Pages karena Laravel membutuhkan server PHP dan database.

Untuk menjalankan project, gunakan server lokal seperti Laragon atau jalankan perintah:

```bash
php artisan serve
```

Jika ingin membuat demo online, project perlu dideploy ke hosting yang mendukung PHP dan MySQL.

---

## Status Project

Project ini dibuat untuk memenuhi tugas UTS Pemrograman Web 2.

Status fitur:

- Login admin dan mahasiswa selesai
- Role protection selesai
- CRUD data master selesai
- Pengajuan prestasi selesai
- Verifikasi prestasi selesai
- Klaim reward selesai
- Pencairan reward selesai
- Laporan per periode selesai
- Data dummy menggunakan seeder selesai

---