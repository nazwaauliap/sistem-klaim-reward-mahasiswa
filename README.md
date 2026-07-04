<div align="center">

# 🏆 SIKAREMA
### Sistem Klaim Reward Prestasi Mahasiswa

Platform berbasis **Laravel 13** yang digunakan untuk mengelola pengajuan prestasi mahasiswa, proses verifikasi, pengajuan klaim reward, hingga pencairan reward secara terintegrasi.

![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap)

🌐 **Live Demo (Desktop Only)**
https://sikarema.freedev.app

</div>

---

# 📖 Tentang SIKAREMA

SIKAREMA (**Sistem Klaim Reward Prestasi Mahasiswa**) merupakan aplikasi berbasis web yang dirancang untuk mempermudah proses pengelolaan prestasi mahasiswa mulai dari pengajuan prestasi, verifikasi oleh dosen dan admin, pengajuan klaim reward, hingga proses pencairan reward.

Sistem ini dibangun menggunakan **Laravel 13** dengan arsitektur yang telah mendukung **REST API** menggunakan **Laravel Sanctum**, sehingga dapat dikembangkan lebih lanjut menjadi aplikasi mobile tanpa perlu mengubah backend.

---

# ✨ Fitur Utama

### 👨‍🎓 Mahasiswa

- Login
- Dashboard Mahasiswa
- Pengajuan Prestasi
- Upload Sertifikat
- Melihat Status Verifikasi
- Pengajuan Klaim Reward
- Riwayat Klaim Reward

---

### 👨‍🏫 Dosen

- Login
- Review Prestasi Mahasiswa
- Verifikasi Prestasi
- Memberikan Catatan

---

### 👨‍💼 Admin

- Dashboard Admin
- Kelola Mahasiswa
- Kelola Prestasi
- Verifikasi Prestasi
- Kelola Periode Klaim
- Kelola Jenis Reward
- Kelola Pencairan Reward
- Laporan

---

### 👑 Super Admin

- Kelola Hak Akses
- Kelola User
- Manajemen Sistem

---

# 🔥 REST API

Backend telah menyediakan REST API menggunakan Laravel Sanctum yang siap digunakan oleh aplikasi mobile.

Contoh endpoint:

```http
POST /api/v1/login
GET  /api/v1/profile
GET  /api/v1/dashboard
GET  /api/v1/prestasi
POST /api/v1/prestasi
GET  /api/v1/klaim-reward
POST /api/v1/klaim-reward
POST /api/v1/logout
```

---

# 🛠 Tech Stack

- Laravel 13
- PHP 8.3
- MySQL
- Bootstrap 5
- Laravel Sanctum
- REST API
- Blade Template

---

# ⚙️ Instalasi

Clone repository

```bash
git clone https://github.com/USERNAME/sikarema.git
```

Masuk ke project

```bash
cd sikarema
```

Install dependency

```bash
composer install
```

Copy environment

```bash
cp .env.example .env
```

Generate key

```bash
php artisan key:generate
```

Migrasi database

```bash
php artisan migrate --seed
```

Storage link

```bash
php artisan storage:link
```

Jalankan aplikasi

```bash
php artisan serve
```

---

# 🔑 Demo Account

## Mahasiswa

```
Email    : nazwa@sikarema.test
Password : password
```

## Dosen

```
Email    : dosen@sikarema.test
Password : password
```

## Admin

```
Email    : admin@sikarema.test
Password : password
```

## Super Admin

```
Email    : superadmin@sikarema.test
Password : password
```

---

# 📂 Struktur Project

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
```

---

# 📱 Roadmap

- ✅ Website Laravel
- ✅ REST API Laravel Sanctum
- 🔄 Flutter Mobile App
- ⏳ Push Notification
- ⏳ QR Verification
- ⏳ Email Notification

---

# 👨‍💻 Developer

**nazwaauliap**

---

⭐ Jangan lupa berikan **Star** apabila project ini bermanfaat.
