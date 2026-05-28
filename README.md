<div align="center">

<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">

<br><br>

# 🏆 SIKAREMA
### Sistem Pengajuan Prestasi dan Klaim Reward Mahasiswa

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
  <img src="https://img.shields.io/badge/Blade-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Blade">
  <img src="https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white" alt="Git">
  <img src="https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white" alt="GitHub">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Status-Selesai-brightgreen?style=flat-square" alt="Status">
  <img src="https://img.shields.io/badge/Tugas-UTS%20Pemrograman%20Web%202-blue?style=flat-square" alt="Tugas">
  <img src="https://img.shields.io/badge/Arsitektur-MVC-orange?style=flat-square" alt="Arsitektur">
</p>

> Aplikasi berbasis web untuk mengelola **pengajuan prestasi mahasiswa** dan **klaim reward** menggunakan Laravel dengan konsep MVC serta proses CRUD pada data master dan transaksi.

</div>

---

## 📋 Daftar Isi

- [Fitur Utama](#-fitur-utama)
- [Teknologi](#-teknologi-yang-digunakan)
- [Konsep MVC](#-konsep-mvc)
- [Proses CRUD](#-proses-crud)
- [Alur Sistem](#-alur-sistem)
- [Role Pengguna](#-role-pengguna)
- [Struktur Menu](#-struktur-menu)
- [Skema Database](#-skema-database)
- [Fitur Laporan](#-fitur-laporan)
- [Instalasi](#-instalasi-project)
- [Akun Demo](#-akun-demo)
- [Cara Demo](#-cara-menjalankan-demo)
- [Status Project](#-status-project)

---

## ✨ Fitur Utama

### 🔐 Admin
| Fitur | Keterangan |
|-------|-----------|
| Login & Dashboard | Akses panel admin |
| Kelola Data Mahasiswa | CRUD data mahasiswa |
| Kelola Hak Akses | Manajemen role pengguna |
| Kelola Kategori & Tingkat Prestasi | Data master prestasi |
| Kelola Periode Klaim | Pengaturan periode klaim reward |
| Kelola Jenis Reward | Data master reward |
| Verifikasi Prestasi | Review & setujui prestasi mahasiswa |
| Proses Klaim Reward | Approve/tolak klaim reward |
| Pencairan Reward | Catat pencairan reward |
| Laporan | Laporan berdasarkan periode klaim |

### 🎓 Mahasiswa
| Fitur | Keterangan |
|-------|-----------|
| Login & Dashboard | Akses panel mahasiswa |
| Ajukan Prestasi | Submit prestasi baru |
| Lihat Prestasi Saya | Riwayat prestasi milik sendiri |
| Status Verifikasi | Pantau status verifikasi prestasi |
| Ajukan Klaim Reward | Klaim reward atas prestasi terverifikasi |
| Status Klaim | Pantau status klaim reward |

---

## 🛠 Teknologi yang Digunakan

<div align="center">

| Teknologi | Kegunaan |
|-----------|----------|
| <img src="https://img.shields.io/badge/Laravel-FF2D20?logo=laravel&logoColor=white"> | Framework PHP utama |
| <img src="https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white"> | Bahasa pemrograman backend |
| <img src="https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white"> | Database |
| <img src="https://img.shields.io/badge/Bootstrap-7952B3?logo=bootstrap&logoColor=white"> | Framework CSS frontend |
| <img src="https://img.shields.io/badge/Blade-FF2D20?logo=laravel&logoColor=white"> | Template engine Laravel |
| <img src="https://img.shields.io/badge/Laragon-0E83CD?logo=laragon&logoColor=white"> | Development environment |
| <img src="https://img.shields.io/badge/Git-F05032?logo=git&logoColor=white"> | Version control |
| <img src="https://img.shields.io/badge/GitHub-181717?logo=github&logoColor=white"> | Remote repository |

</div>

---

## 🏗 Konsep MVC

Project SIKAREMA menggunakan konsep MVC Laravel — **Model**, **View**, dan **Controller**.

<details>
<summary><b>📦 Model</b> — menghubungkan aplikasi dengan tabel database</summary>

```
app/Models/
├── User.php
├── Mahasiswa.php
├── HakAkses.php
├── KategoriPrestasi.php
├── TingkatPrestasi.php
├── PeriodeKlaim.php
├── JenisReward.php
├── PrestasiMahasiswa.php
├── KlaimReward.php
└── PencairanReward.php
```
</details>

<details>
<summary><b>🖼 View</b> — menampilkan halaman website kepada pengguna</summary>

```
resources/views/
├── auth/
│   └── login.blade.php
├── layouts/
│   ├── admin.blade.php
│   └── mahasiswa.blade.php
├── mahasiswa/
│   └── index.blade.php
├── prestasi-mahasiswa/
│   └── index.blade.php
├── mahasiswa-panel/
│   ├── dashboard.blade.php
│   ├── prestasi/
│   │   └── index.blade.php
│   └── klaim-reward/
│       └── index.blade.php
└── laporan/
    └── index.blade.php
```
</details>

<details>
<summary><b>⚙️ Controller</b> — mengatur proses data dari model ke view</summary>

```
app/Http/Controllers/
├── AuthController.php
├── MahasiswaController.php
├── HakAksesController.php
├── KategoriPrestasiController.php
├── TingkatPrestasiController.php
├── PeriodeKlaimController.php
├── JenisRewardController.php
├── PrestasiMahasiswaController.php
├── MahasiswaDashboardController.php
├── MahasiswaPrestasiController.php
├── MahasiswaKlaimRewardController.php
├── AdminKlaimRewardController.php
├── PencairanRewardController.php
└── LaporanController.php
```
</details>

---

## 🔄 Proses CRUD

CRUD diterapkan pada beberapa data master dan transaksi:

| Data | Create | Read | Update | Delete |
|------|:------:|:----:|:------:|:------:|
| Data Mahasiswa | ✅ | ✅ | ✅ | ✅ |
| Kategori Prestasi | ✅ | ✅ | ✅ | ✅ |
| Tingkat Prestasi | ✅ | ✅ | ✅ | ✅ |
| Periode Klaim | ✅ | ✅ | ✅ | ✅ |
| Jenis Reward | ✅ | ✅ | ✅ | ✅ |
| Pencairan Reward | ✅ | ✅ | ✅ | ✅ |

---

## 🔁 Alur Sistem

```
Mahasiswa Login
      │
      ▼
Ajukan Prestasi ──► Status: MENUNGGU
      │
      ▼
Admin Verifikasi Prestasi
      │
  ┌───┴───┐
  ▼       ▼
TOLAK   TERVERIFIKASI
          │
          ▼
    Mahasiswa Klaim Reward
          │
          ▼
    Admin Proses Klaim
          │
      ┌───┴───┐
      ▼       ▼
    TOLAK   DISETUJUI
                │
                ▼
        Admin Catat Pencairan
                │
                ▼
        Admin Lihat Laporan
```

---

## 👥 Role Pengguna

### 🔑 Admin
Dapat mengelola data master, memverifikasi prestasi, memproses klaim reward, mencatat pencairan reward, dan melihat laporan.

### 🎓 Mahasiswa
Dapat mengajukan prestasi, melihat prestasi miliknya sendiri, mengajukan klaim reward, dan memantau status klaim.

### 🛡 Hak Akses

- ✅ Admin hanya dapat mengakses halaman admin
- ✅ Mahasiswa hanya dapat mengakses halaman mahasiswa
- ✅ Pengguna belum login → diarahkan ke halaman login
- ✅ Role salah → tidak dapat akses halaman yang bukan haknya

---

## 📂 Struktur Menu

<table>
<tr>
<th>🔑 Menu Admin</th>
<th>🎓 Menu Mahasiswa</th>
</tr>
<tr>
<td>

- 📊 Dashboard
- 👤 Data Mahasiswa
- 🔒 Hak Akses
- 🏷 Kategori Prestasi
- 📈 Tingkat Prestasi
- 📅 Periode Klaim
- 🎁 Jenis Reward
- ✅ Verifikasi Prestasi
- 💰 Klaim Reward
- 💳 Pencairan Reward
- 📋 Laporan

</td>
<td>

- 📊 Dashboard Mahasiswa
- ➕ Ajukan Prestasi
- 📄 Prestasi Saya
- 🎁 Klaim Reward

</td>
</tr>
</table>

---

## 🗄 Skema Database

### Tabel Master
```
mahasiswas          hak_akses           kategori_prestasis
tingkat_prestasis   periode_klaims      jenis_rewards
users
```

### Tabel Transaksi
```
prestasi_mahasiswas     klaim_rewards     pencairan_rewards
```

---

## 📊 Fitur Laporan

Admin dapat melihat laporan berdasarkan periode klaim, menampilkan:

- 👤 Total mahasiswa
- 🏆 Total prestasi
- 💰 Total klaim reward
- 💵 Total nominal dicairkan
- 📌 Status prestasi
- 📌 Status klaim reward
- 🆕 Prestasi terbaru
- 🆕 Klaim reward terbaru

---

## 🚀 Instalasi Project

### Prasyarat
- PHP >= 8.x
- Composer
- MySQL
- Laragon / XAMPP / server lokal sejenis

### Langkah Instalasi

**1. Clone repository**
```bash
git clone https://github.com/nazwaauliap/sistem-klaim-reward-mahasiswa.git
cd nama-repository
```

**2. Install dependency Laravel**
```bash
composer install
```

**3. Konfigurasi environment**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Atur database di `.env`**
```env
DB_DATABASE=sikarema
DB_USERNAME=root
DB_PASSWORD=
```

**5. Jalankan migration & seeder**
```bash
php artisan migrate
php artisan db:seed --class=SikaremaDummySeeder
```

**6. Setup storage & jalankan server**
```bash
php artisan storage:link
php artisan serve
```

**7. Buka di browser**
```
http://127.0.0.1:8000
```

---

## 🔐 Akun Demo

<table>
<tr>
<th>Role</th>
<th>Email</th>
<th>Password</th>
</tr>
<tr>
<td>🔑 Admin</td>
<td><code>admin@sikarema.test</code></td>
<td><code>password</code></td>
</tr>
<tr>
<td>🎓 Mahasiswa</td>
<td><code>mahasiswa@sikarema.test</code></td>
<td><code>password</code></td>
</tr>
</table>

---

## 🎬 Cara Menjalankan Demo

<details>
<summary><b>🔑 Demo Admin</b></summary>

1. Login menggunakan akun admin
2. Buka dashboard admin
3. Tunjukkan data master: Data Mahasiswa, Kategori Prestasi, Tingkat Prestasi, Periode Klaim, Jenis Reward
4. Tunjukkan proses CRUD pada salah satu data (contoh: Data Mahasiswa)
5. Buka menu **Verifikasi Prestasi** → ubah status prestasi mahasiswa
6. Buka menu **Klaim Reward** → proses klaim reward mahasiswa
7. Buka menu **Pencairan Reward** → tambahkan data pencairan reward
8. Buka menu **Laporan** → filter berdasarkan periode klaim

</details>

<details>
<summary><b>🎓 Demo Mahasiswa</b></summary>

1. Login menggunakan akun mahasiswa
2. Buka dashboard mahasiswa
3. Ajukan prestasi baru
4. Lihat data pada menu **Prestasi Saya**
5. Jika prestasi sudah terverifikasi, ajukan klaim reward
6. Pantau status klaim reward pada menu **Klaim Reward**

</details>

---

## ⚠️ Catatan Deployment

> Project Laravel ini **tidak dapat** dijalankan langsung menggunakan **GitHub Pages** karena membutuhkan server PHP dan database.

Untuk menjalankan project, gunakan:
- **Laragon** (direkomendasikan untuk Windows)
- Perintah `php artisan serve` untuk server lokal

Untuk demo online, deploy ke hosting yang mendukung **PHP** dan **MySQL**.

---

## ✅ Status Project

> Dibuat untuk memenuhi tugas **UTS Pemrograman Web 2**

| Fitur | Status |
|-------|--------|
| Login admin dan mahasiswa | ✅ Selesai |
| Role protection | ✅ Selesai |
| CRUD data master | ✅ Selesai |
| Pengajuan prestasi | ✅ Selesai |
| Verifikasi prestasi | ✅ Selesai |
| Klaim reward | ✅ Selesai |
| Pencairan reward | ✅ Selesai |
| Laporan per periode | ✅ Selesai |
| Data dummy (seeder) | ✅ Selesai |

---

<div align="center">

Made with ❤️ using <img src="https://img.shields.io/badge/Laravel-FF2D20?logo=laravel&logoColor=white" alt="Laravel" style="vertical-align:middle">

</div>
