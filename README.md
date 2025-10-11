<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Profile
- Nama : Tri Anggoro Budi S
- NPM  : 4523210108
- Mata Kuliah : Prak. Pemrograman Berbasis Web (A)

## Tentang Praktikum Kedua
Hal-hal yang dipelajari dan diperlukan pada praktikum kali ini: 
- Laravel: Framework PHP yang akan menjadi "kerangka rumah" untuk aplikasi kita. Ia menyediakan banyak alat siap pakai agar kita bisa membangun aplikasi dengan cepat dan terstruktur.
- Composer: "Manajer Paket" untuk PHP. Tugasnya adalah mengunduh Laravel dan semua "pustaka" (library) lain yang dibutuhkan oleh Laravel agar bisa berjalan.
- Artisan: "Asisten pribadi" atau pisau Swiss Army bawaan Laravel. Ini adalah alat baris perintah (command-line tool) yang akan kita gunakan untuk banyak hal, salah satunya adalah untuk menyalakan server development lokal (php artisan serve).

## Instalasi Proyek LaraPress
Instalasi dilakukan dengan memastikan hal dibawah ini sudah ada:
- Server Lokal (Laragon atau XAMPP sudah terinstal dan berjalan).
- Composer (terinstal secara global).
- Terminal / Command Line (CMD, PowerShell, atau terminal bawaan Laragon).
- Code Editor (VS Code sangat disarankan).
- Web Browser (Google Chrome, Firefox, dll.).

1. Install Laravell
   bash
   composer global require laravel/installer
2. Membuat Proyek Baru
   bash
   laravel new LaraPress
3. Konfigurasi Composer
   bash
   cd example-app 
   npm install && npm run build
   composer run dev
5. Jalankan Server Laravel
   bash
   php artisan serve
6. Optional Settings Code
   bash
   code . 

### Proyek LaraPress
LaraPress merupakan blog sederhana yang dibangun dengan menggunakan Laravel 12 sebagai pembelajaran sederhana untuk tujuan pengembangan dan pembelajaran. LaraPress mendemonstrasikan konsep-konsep dasar Laravel seperti routing, views, dan struktur MVC.

Terdapat 3 Menu dalam pembelajaran kali ini:
#### Menu Utama (Welcome Page)
<img width="1918" height="1198" alt="Screenshot 2025-10-03 103552" src="public/img/main-page.png"/>
#### Menu Tentang Kami (About)
<img width="1918" height="1198" alt="Screenshot 2025-10-03 103552" src="public/img/about-us.png"/>
#### Menu Kontak (Contact)
<img width="1918" height="1198" alt="Screenshot 2025-10-03 103552" src="public/img/kontak-kami.png"/>

## Fitur Yang  DiImplementasikan
### Halaman Utama
  - Mengubah tampilan default laravel menjadi tampilan blog sederhana
  - Menampilkan judul "Selamat Datang di Blog LaraPress"
  - Menggunakan Struktur HTML Sederhana
  - Menambahkan Link Menu untuk Sub Menu

<img width="1918" height="1198" alt="Screenshot 2025-10-03 103552" src="https://github.com/user-attachments/assets/5acdfecc-538e-480d-a533-4f630b53bbf4" />

### Halaman Tentang Kami (About)
- Route `/tentang-kami`
- Menampilkan Halaman Tentang Kami sebagai informasi dari LaraPress
- Menampilkan Menu kembali ke Halaman Utama
  
<img width="1918" height="1198" alt="Screenshot 2025-10-03 111907" src="https://github.com/user-attachments/assets/e67f9aa0-30b6-443c-bd54-30d50d6d7540" />

### Halaman Kontak (Contact)
- Route `/kontak`
- Menampilkan form pengisian kontak dengan isi tertera pada gambar
- Menampilkan Menu kembali ke Halaman Utama

<img width="1918" height="1197" alt="Screenshot 2025-10-03 130514" src="https://github.com/user-attachments/assets/6db222b6-5a0e-4aaa-a362-a5ae899505c0" />
<img width="1918" height="1198" alt="Screenshot 2025-10-03 130436" src="https://github.com/user-attachments/assets/24f00083-dd5c-45be-ae17-c031ad17bf1c" />

### File yang dimodifikasi
- `resources/views/welcome.blade.php`  
  - Mengubah tampilan default Laravel menjadi HTML sederhana  
  - Menampilkan pesan sambutan untuk pengunjung blog

- Menambahkan Menu dengan menggunakan : 
  html
   <h4>Berikut merupakan sub halaman:</h4>
        <p> Halaman Tentang Kami</p>
            <a href="/tentang-kami"> Lihat Halaman Tentang Kami</a>
        <br>
        <p> Halaman Kontak</p>
                <a href="/kontak"> Lihat Halaman Kontak</a>
    <br>
    <h3> Menu Kembali </h3>
  <a href="/"> Kembali ke Halaman Utama</a> 

- resources/views/about.blade.php (*BARU*)  
  - File view baru untuk halaman *"Tentang Kami"*  
  - Berisi informasi terkait tentang LaraPress
  - Menambahkan Menu Kembali pada about.blade.php dengan menggunakan:
    html
    <h3> Menu Kembali </h3>
    <a href="/"> Kembali ke Halaman Utama</a> 

- `routes/web.php`  
  - Menambahkan route baru `/tentang-kami` yang mengarah ke view `about.blade.php`

- `resources/views/contact.blade.php` (**BARU**)  
  - File view baru untuk halaman **"Tentang Kami"**  
  - Berisi informasi terkait tentang LaraPress
  - - Menambahkan Menu Kembali pada `contact.blade.php` dengan menggunakan:
  - html
    <h3> Menu Kembali </h3>
    <a href="/"> Kembali ke Halaman Utama</a>

- routes/web.php  
  - Menambahkan route baru /kontak yang mengarah ke view contact.blade.php  

## Langkah Implementasi
### Step 1 : Memodifikasi Halaman Welcome 
Mengubah file resources/views/welcome.blade.php dari tampilan default Laravel (266 baris) menjadi HTML sederhana dan menambahkan style sedikit agar rapih: 
html
<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang di LaraPress</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .contact-form { max-width: 400px; margin: auto; }
        label { display: block; margin-top: 15px; }
        input, textarea { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; padding: 10px 20px; }
    </style>
</head>
<body>
    <h1>Selamat Datang di Blog LaraPress</h1>
    <p>Ini adalah halaman utama dari aplikasi blog kita.</p>

    <h4>Berikut merupakan sub halaman:</h4>
        <p> Halaman Tentang Kami</p>
            <a href="/tentang-kami"> Lihat Halaman Tentang Kami</a>
        <br>
        <p> Halaman Kontak</p>
                <a href="/kontak"> Lihat Halaman Kontak</a>
    <br>

    <h3> Menu Kembali </h3>
    <a href="/"> Kembali ke Halaman Utama</a>
</body>
</html>

### Step 2 : Membuat Route Baru
Menambahkan route baru di routes/web.php:
- Route yang ditambahkan diantaranya adalah /tentang-kami dan /kontak
  php
  <?php
  use Illuminate\Support\Facades\Route;
  Route::get('/', function () {
    return view('welcome');
  })->name('welcome');

  Route::get('/tentang-kami', function () {
    return view('about');
    })->name('about');

  Route::get('/kontak', function () {
    return view('contact');
    })->name('kontak');

  
### Step 3 : Membuat View About (Tentang Kami)
- Membuat File baru dengan konten Tentang Kami resources/views/about.blade.php
html
<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang di LaraPress</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .contact-form { max-width: 400px; margin: auto; }
        label { display: block; margin-top: 15px; }
        input, textarea { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; padding: 10px 20px; }
    </style>
</head>
<body>
    <h1>Selamat Datang di Blog LaraPress</h1>
    <p>Ini adalah halaman utama dari aplikasi blog kita.</p>

    <h4>Berikut merupakan sub halaman:</h4>
        <p> Halaman Tentang Kami</p>
            <a href="/tentang-kami"> Lihat Halaman Tentang Kami</a>
        <br>
        <p> Halaman Kontak</p>
                <a href="/kontak"> Lihat Halaman Kontak</a>
    <br>

    <h3> Menu Kembali </h3>
    <a href="/"> Kembali ke Halaman Utama</a>
</body>
</html>

### Step 4 : Membuat View Contact (Kontak)
html 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .contact-form { max-width: 400px; margin: auto; }
        label { display: block; margin-top: 15px; }
        input, textarea { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; padding: 10px 20px; }
    </style>
</head>
<body>
<h1>Contact Information</h1>
<h3>Get in Touch</h3>
<p> Name: Soja Purnamasari</p>
<p> Email: soja.purnamasari@gmail</p>

    <h2>Contact Us</h2>
    <form class="contact-form" method="POST" action="#">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit">Send</button>
    </form>
    <br>
    <h3> Menu Kembali </h3>
    <a href="/"> Kembali ke Halaman Utama</a>
</body>
</html>


## Endpoint yang Tersedia

| Route      | Method | Deskripsi                              |
|------------|--------|----------------------------------------|
| /        | GET    | Halaman utama LaraPress                  |
| /about   | GET    | Halaman tentang LaraPress                |
| /contact | GET    | Halaman tentang Kontak LaraPress      |

---

## Teknologi yang Digunakan

- Framework: Laravel 12  
- PHP Version: 8.4.2  
- Database: MySQL  
- Frontend: Blade Template Engine, HTML, CSS  
- Build Tool: None
- 
## Reference
- *[Laravel Documentation](https://laravel.com/docs/12.x/installation)*
- Lisence : [MIT Lisence](https://opensource.org/license/MIT)
