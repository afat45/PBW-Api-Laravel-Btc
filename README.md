<br />
<div align="center">
  <a href="https://github.com/afat45/PBW-Api-Laravel-Btc">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" alt="Laravel Logo" width="200">
  </a>

  <h3 align="center">PBW API Laravel - BTC</h3>

  <p align="center">
    RESTful API berbasis Laravel untuk manajemen dan layanan data terkait Bitcoin (BTC).
    <br />
    <a href="#-dokumentasi-api"><strong>Jelajahi Dokumentasi »</strong></a>
    <br />
    <br />
  </p>
</div>

## 📸 Dokumentasi & Mockup

*(Catatan: Ganti URL gambar di bawah ini dengan link screenshot, foto dokumentasi, atau mockup aslimu yang sudah diunggah ke folder repositori atau image hosting)*

### 1. Tampilan Dashboard/Mockup Klien
![Mockup Aplikasi](https://via.placeholder.com/800x400.png?text=Tampilan+Mockup+Aplikasi/Klien)
*Gambar 1: Demonstrasi mockup antarmuka pengguna yang mengkonsumsi API ini.*

### 2. Pengujian Endpoint (Postman/Insomnia)
![Dokumentasi API](https://via.placeholder.com/800x400.png?text=Screenshot+Postman+atau+Swagger)
*Gambar 2: Dokumentasi pengujian endpoint API.*

## ✨ Fitur Utama

* **RESTful Architecture**: Struktur API standar yang mudah dikonsumsi oleh frontend (seperti Vue.js atau Flutter).
* **Manajemen Data BTC**: Sistem terstruktur untuk menangani informasi atau transaksi terkait Bitcoin.
* **JSON Response**: Format balasan seragam dan konsisten untuk memudahkan parsing data.
* **Integrasi Database Mulus**: Penggunaan Eloquent ORM untuk komunikasi dengan database.

## 🛠️ Teknologi yang Digunakan

* [Laravel](https://laravel.com/) - Framework PHP utama untuk membangun API.
* [PHP](https://www.php.net/) - Bahasa pemrograman backend.
* [MySQL](https://www.mysql.com/) - Manajemen basis data relasional.

## 🚀 Panduan Instalasi (Getting Started)

Untuk menjalankan proyek ini di lingkungan lokal (localhost), ikuti panduan berikut:

### Prasyarat

Pastikan sistem komputermu sudah terinstal:
* PHP (minimal versi 8.1 disarankan)
* Composer
* MySQL / MariaDB (bisa menggunakan XAMPP/Laragon)

### Langkah Instalasi

1.  Clone repositori ini ke dalam direktori lokalmu:
    ```sh
    git clone https://github.com/afat45/PBW-Api-Laravel-Btc.git
    ```
2.  Masuk ke dalam folder proyek:
    ```sh
    cd PBW-Api-Laravel-Btc
    ```
3.  Instal seluruh dependensi proyek:
    ```sh
    composer install
    ```
4.  Salin file konfigurasi environment dan sesuaikan kredensial database-mu:
    ```sh
    cp .env.example .env
    ```
5.  Generate Application Key:
    ```sh
    php artisan key:generate
    ```
6.  Jalankan migrasi untuk membangun struktur tabel di database:
    ```sh
    php artisan migrate
    ```
7.  Mulai local development server:
    ```sh
    php artisan serve
    ```

## 📡 Dokumentasi API

Berikut adalah gambaran umum endpoint yang tersedia. *(Silakan sesuaikan kembali dengan rute asli yang ada di kode)*

| HTTP Method | Endpoint | Deskripsi |
|---|---|---|
| `GET` | `/api/btc` | Mengambil seluruh data BTC |
| `GET` | `/api/btc/{id}` | Mengambil detail spesifik data BTC berdasarkan ID |
| `POST` | `/api/btc` | Menambahkan data BTC baru |
| `PUT/PATCH` | `/api/btc/{id}` | Memperbarui data BTC yang sudah ada |
| `DELETE` | `/api/btc/{id}` | Menghapus data BTC dari sistem |

## 👨‍💻 Penulis

**Dharma Pala Candra**
* **NIM:** 2409116065
* **Kelas:** Sistem Informasi 2024 B

---
⭐ *Jangan lupa untuk memberikan bintang (star) pada repositori ini jika kamu menyukainya!*
