# PRAKTIKUM 4: SISTEM AUTENTIKASI DENGAN LARAVEL BREEZE

# 📃 Identitas Diri

- **Nama**             : Revalina Adelia
- **NPM**              : 4523210091
- **Mata Kuliah**      : Pemrograman Berbasis Web (A)
- **Dosen Pengampu**   : Adi Wahyu Pribadi, S.Si., M.Kom.
- **Tanggal**          : 10 Oktober 2025
- **Materi**           : Implementasi Autentikasi Pengguna

---
## 🎯 Tujuan Pembelajaran

Setelah mengikuti praktikum ini, mahasiswa diharapkan mampu:

1. Memahami konsep autentikasi pada aplikasi web.

2. Menginstall dan mengonfigurasi Laravel Breeze.

3. Menerapkan fitur login, register, dan _logout_.

4. Melindungi _route_ menggunakan _middleware_.

5. Mengelola profil pengguna dengan baik dan aman.

Dengan praktikum ini, mahasiswa diharapkan tidak hanya memahami teori autentikasi, tetapi juga mampu mengimplementasikannya secara langsung menggunakan _framework_ Laravel.

---
## 📋 Deskripsi Umum

Pada praktikum ini, mahasiswa akan mempelajari bagaimana cara menambahkan sistem autentikasi pengguna secara lengkap menggunakan **Laravel Breeze**.

Laravel Breeze merupakan salah satu _package_ resmi dari Laravel yang berfungsi sebagai **starter kit autentikasi sederhana**, namun cukup lengkap untuk kebutuhan dasar sebuah aplikasi web modern.

Fitur yang diimplementasikan antara lain:

1. Registrasi pengguna baru

2. Login dan _Logout_

3. _Dashboard_ pengguna

4. Manajemen profil pengguna

5. Reset _password_ 

6. Verifikasi email

7. Manajemen sesi (_Session Management_)

---
## 🔐 Konsep Dasar Autentikasi

**Apa itu Autentikasi?**

**Autentikasi** adalah proses verifikasi identitas pengguna. Tujuannya adalah memastikan bahwa pengguna yang mencoba mengakses sistem benar-benar orang yang berhak. Dengan kata lain, autentikasi menjawab pertanyaan "**Siapa Anda?**".

**Analogi Sederhana:**

Seperti saat masuk ke gedung kampus, kita perlu menunjukkan kartu identitas mahasiswa (KTM) agar satpam memastikan bahwa kita benar-benar mahasiswa kampus tersebut.

### Autentikasi vs Otorisasi

| Autentikasi                                    | Otorisasi                                               | 
|------------------------------------------------|---------------------------------------------------------|
| Proses verifikasi identitas pengguna           | Proses pemberian izin akses berdasarkan peran (_role_)  |
| Menjawab pertanyaan "Siapa Anda?"              | Menjawab pertanyaan "Apa yang boleh Anda lakukan?"      |
| Contoh: login menggunakan email dan _password_ | Contoh: Hanya admin yang bisa menghapus data            |

### Alur Kerja Login

1. Pengguna mengisi email dan _password_.
   
2. Sistem mencari data _user_ berdasarkan email.
   
3. _Password_ yang dimasukkan di-hash.
   
4. Sistem membandingkan _hash password_ input dengan yang ada di _database_.
   
5. Jika cocok, sistem membuat _session_ login.
   
6. Pengguna diarahkan ke _dashboard_.

### Password Hashing

**Alasan _password_ perlu di hash**

- _Password_ disimpan dalam bentuk _hash_, bukan (_plain text_).

- _Hash_ bersifat satu arah (Bcrypt/Argon2), artinya _password_ asli tidak bisa dikembalikan dari hasil _hash_.

- Dengan begitu, walaupun _database_ bocor, _password_ pengguna tetap aman.

**Analogi**: Seperti menggiling daging menjadi sosis - tidak bisa mengubah sosis kembali menjadi daging utuh.

### Session & Cookies

- _Session_ menyimpan status login pengguna di server.
  
- _Cookie_ menyimpan identitas sementara di browser pengguna.

- Jadi, setelah login satu kali, pengguna tidak perlu login ulang selama _session_ masih aktif.

**Analogi**: Seperti stempel konser - setelah dapat stempel, tidak perlu menunjukkan tiket lagi.

---
## 🛠️ Langkah-Langkah Implementasi

Langkah implementasi dilakukan secara berurutan untuk memastikan sistem berjalan dengan benar.

### Langkah 1: Install Laravel Breeze

`composer require laravel/breeze --dev`

Perintah ini berfungsi untuk mengunduh _package_ Laravel Breeze yang berisi template autentikasi lengkap dengan file controller, _route_, dan view dasar.

### Langkah 2: Install Scaffolding Breeze

`php artisan breeze:install blade --pest`

Tahap ini membuat struktur awal proyek autentikasi berbasis Blade dan Alpine.js. Selain itu, Laravel juga menambahkan file konfigurasi, _route_ autentikasi, dan template dasar untuk halaman login serta registrasi.

**Pilihan:**

- Template: Blade with Alpine

- Testing: Pest

**Yang Diinstal:**

- Controllers autentikasi

- _Views_ (login, register, dll)

- _Routes_ autentikasi

- Tailwind CSS

- Testing setup

### Langkah 3: Install Dependencies Frontend

`npm install`

Perintah ini mengunduh seluruh _dependency frontend_ seperti Tailwind CSS dan Alpine.js yang digunakan oleh Breeze.

### Langkah 4: Compile Assets

`npm run dev`

Digunakan untuk mengompilasi file CSS dan JavaScript agar dapat digunakan pada tampilan antarmuka aplikasi.

### Langkah 5: Jalankan Migrasi

`php artisan migrate`

Perintah ini membuat tabel baru di _database_ seperti `users` (jika belum ada), `password_reset_tokens`, `sessions` yang diperlukan oleh sistem autentikasi dan kolom `remember_token` di tabel _users_

### Langkah 6: Update Routes (Menambahkan Route Lama)

File: `routes/web.php`

``` routes/web.php
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
```

Pada tahap ini, kita menambahkan beberapa _route_ publik (seperti home) serta _route_ yang dilindungi middleware `auth` dan `verified`.

---
## 📂 File yang Ditambahkan oleh Breeze

### Controllers (9 Files)

Lokasi: `app/Http/Controllers/Auth/`

| File                                            | Fungsi                           | 
|-------------------------------------------------|----------------------------------|
| `AuthenticatedSessionController.php`            | Login dan _Logout_               |
| `RegisteredUserController.php`                  | Registrasi _user_ baru           |
| `PasswordResetLinkController.php`               | _Request_ reset _password_       |
| `NewPasswordController.php`                     | Set _password_ baru              |
| `EmailVerificationNotificationController.php`   | Kirim email verifikasi           |
| `EmailVerificationPromptController.php`         | Tampil notif verifikasi          |
| `VerifyEmailController.php`                     | Verifikasi email                 |
| `PasswordController.php`                        | Update _password_                |
| `ConfirmablePasswordController.php`             | Konfirmasi _password_            |

### Views (6 Files)

Lokasi: `resources/views/auth/`

| File                              | Fungsi                           | 
|-----------------------------------|----------------------------------|
| `login.blade.php`                 | Form login                       |
| `register.blade.php`              | Form registrasi                  |
| `forgot-password.blade.php`       | Form lupa _password_             |
| `reset-password.blade.php`        | Form reset _password_            |
| `verify-email.blade.php`          | Form verifikasi email            |
| `confirm-password.blade.php`      | Form konfirmasi _password_       |

### Layouts & Components

- `resources/views/layouts/app.blade.php` - Layout utama

- `resources/views/layouts/guest.blade.php` - Layout untuk guest

- `resources/views/layouts/navigation.blade.php` - Navigation bar

- `resources/views/dashboard.blade.php` - _Dashboard_

- `resources/views/profile/edit.blade.php` - Edit profile

### Routes

- `routes/auth.php` - Semua _route_ autentikasi

---
## 🌐 Routes Autentikasi

Bagian ini menjelaskan _route_ yang dihasilkan oleh Breeze. _Route_ dibagi menjadi dua kelompok utama: **public _routes_** yang bisa diakses semua pengguna, dan _protected routes_ yang hanya bisa diakses setelah login.

### Public Routes

| Route                    | Method     | Deskripsi
|--------------------------|------------|--------------------------------|
| `login`                  | GET, POST  | Halaman dan proses login       |
| `register`               | GET, POST  | Halaman dan proses registrasi  |
| `forgot-password`        | GET, POST  | Request link reset _password_  |
| `reset-password/{token}` | GET, POST  | Reset _password_ dengan konten |

### Protected Routes (Perlu Login)

| Route               | Method    | Deskripsi                   |
|---------------------|-----------|-----------------------------|
| `/dashboard`        | GET       | Dashboard _user_            |
| `/profile`          | GET       | Halaman edit profile        |
| `/profile`          | PATCH     | Update profile              |
| `/profile`          | DELETE    | Hapus akun                  |
| `/logout`           | POST      | _Logout_                    |
| `/verify-email`     | GET       | Notifikasi verifikasi email |
| `/confirm-password` | GET, POST | Konfirmasi _password_       |

---
## 🔒 Middleware Protection

Middleware berfungsi sebagai "penjaga gerbang" setiap _route_. Dengan middleware, kita bisa memastikan bahwa hanya pengguna yang sudah terautentikasi yang dapat mengakses halaman tertentu. Laravel menyediakan middleware bawaan seperti `auth` dan `verified` yang langsung bisa digunakan.

### Cara Menggunakan Middleware

**Single Route:**

```
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
```

**Route Group:**

```
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'edit']);
});
```

**Multiple Middleware:**

```
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);
```

---
## 🧪 Testing Manual

### Test 1: Registrasi User Baru

1. Akses: `http://127.0.0.1:8000/register`

2. Isi form dengan data valid

3. Klik tombol "Register"

4. Expected: Redirect ke dashboard

5. Result: BERHASIL ✅

<img width="1918" height="1079" alt="Register User Baru" src="https://github.com/user-attachments/assets/ecc227f1-9aff-4ebc-95b4-1b0b501d232b" />

### Test 2: Login dengan Akun Default

1. Akses: `http://127.0.0.1:8000/login`

2. Email: `revadelia4479@gmail.com`

3. Password: `Valina08`

4. Klik "Login"

5. Expected: Redirect ke dashboard

6. Result: BERHASIL ✅

<img width="1919" height="1078" alt="Login" src="https://github.com/user-attachments/assets/fd01cfaf-e2fe-4630-86d1-4fdbb4e3ab65" />

<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/8fb5190d-3c74-45ea-86ee-2d71de1f40d2" />

### Test 3: Dashboard Bisa Diakses setelah Login

1. Sudah login
  
2. Akses: `http://127.0.0.1:8000/dashboard`

3. Expected: Dashboard muncul dengan informasi user

4. Result: BERHASIL ✅

### Test 4: Dashboard Tidak Bisa Diakses tanpa Login

1. Logout dulu

2. Akses: `http://127.0.0.1:8000/dashboard`

3. Expected: Redirect ke /login

4. Result: BERHASIL ✅ - Middleware bekerja!

### Test 5: profile Management

1. Login

2. Akses: `http://127.0.0.1:8000/profile`

3. Edit nama atau email

4. Klik "Save"

5. Expected: Profile berhasil diupdate

6. Result: BERHASIL ✅

<img width="1919" height="793" alt="Profile Information" src="https://github.com/user-attachments/assets/25ebefd1-37ed-41d7-9dbf-64d1cfe3715a" />

<img width="1919" height="1078" alt="Update Password dan Delete Account" src="https://github.com/user-attachments/assets/72127c6e-a8e5-439d-8d23-c26359f41e93" />

### Test 6: Logout

1. Klik tombol "Logout" di navigation

2. Expected: Redirect ke halaman home, session dihapus

3. Result: BERHASIL ✅

<img width="1918" height="1079" alt="Menu Utama (After Logout)" src="https://github.com/user-attachments/assets/94b6b492-c233-4f7d-b233-c5f1e2037be9" />

---
## 📈 Hasil Testing

| No   | Test Case                                  | Status       |
|------|--------------------------------------------|--------------|
| 1    | Registrasi _user_ baru                     | Berhasil ✅ |
| 2    | Login dengan akun default                  | Berhasil ✅ |
| 3    | _Dashboard_ bisa diakses setelah login     | Berhasil ✅ |
| 4    | _Dashboard_ tidak bisa diakses tanpa login | Berhasil ✅ |
| 5    | _Profile management_                       | Berhasil ✅ |
| 6    | _Logout_                                   | Berhasil ✅ |

Quality: ⭐⭐⭐⭐⭐ Excellent

Security: 🔒 Fully Secured

---
## 🎨 Fitur Breeze yang Tersedia

### 1. Autentikasi Dasar

- ✅ Registrasi pengguna baru

- ✅ Login dengan email & password

- ✅ Logout

- ✅ Remember Me functionality

### 2. Password Managament

- ✅ Lupa password (kirim link via email)

- ✅ Reset password dengan token

- ✅ Update password di profile

- ✅ Konfirmasi password untuk aksi sensitif

### 3. Email Verification

- ✅ Kirim email verifikasi saat registrasi

- ✅ Verifikasi email dengan link

- ✅ Kirim ulang email verifikasi

- ✅ Middleware verified untuk route

### 4. Profile Management

- ✅ Edit profile (name, email)

- ✅ Update password

- ✅ Delete account

### 5. Session Management

- ✅ Session handling otomatis

- ✅ Cookie management

- ✅ CSRF protection

---
## 🔐 Fitur Keamanan

Pada Laravel Breeze, apek keamanan menjadi prioritas utama. Setiap data sensitif seperti _password_ selalu di-hash sebelum disimpan. Selain itu, Laravel juga menambahkan perlindungan terhadap serangan umum seperti CSRF dan _brute-force_ login melalui _rate limiting_.

### 1. Password Hashing

```
// Password di-hash sebelum disimpan
'password' => Hash::make($request->password)

// Verifikasi password
Hash::check($request->password, $user->password)
```

### 2. CSRF Protection

```
<form method="POST" action="{{ route('login') }}">
    @csrf  <!-- Token CSRF wajib -->
    <!-- form fields -->
</form>
```

### 3. Session Security

- Session ID di-regenerate setelah login

- HttpOnly cookies (tidak bisa diakses JavaScript)

- Secure cookies di production (HTTPS)

### 4. Rate Limiting

- Throttle di route login (anti brute force)

- Throttle di email verification

- Throttle di password reset

---
## 📊 Database Schema

Tabel-tabel utama yang digunakan oleh sistem autentikasi Laravel antara lain `users`, `password_reset_tokens`, dan `sessions`.

| Column              | Type        | Description                 |
|---------------------|-------------|-----------------------------|
| id                  | bigint      | Primary key                 |
| name                | string      | Nama user                   |
| email               | string      | Email (unique)              |
| email_verified_at   | timestamp   | Waktu verifikasi email      |
| password            | string      | Password (hashed)           |
| remember_token      | string      | Token untuk "Remember Me"   |
| created_at          | timestamp   | Waktu dibuat                |
| updated_at          | timestamp   | Waktu diupdate              |

### Tabel: password_reset_tokens

| Column        | Type        | Description            |
|---------------|-------------|------------------------|
| email         | string      | Email _user_           |
| token         | string      | Token reset _password_ |
| created_at    | timestamp   | Waktu dibuat           |

### Tabel: sessions

| Column              | Type        | Description                 |
|---------------------|-------------|-----------------------------|
| id                  | string      | Session ID                  |
| user_id             | bigint      | ID user (nullable)          |
| ip_address          | string      | IP address                  |
| user_agent          | text        | Browser info                |
| payload             | longtext    | Session data                |
| last_activity       | integer     | Waktu aktivitas terakhir    |

---
## 💡 Tips & Best Practices

### 1. Selalu _hash password_ sebelum disimpan untuk menjaga keamanan data pengguna.

```
// ❌ SALAH - Bahaya!
'password' => $request->password

// ✅ BENAR - Aman!
'password' => Hash::make($request->password)
```

### 2. Gunakan middleware agar _route_ tertentu tidak dapat diakses tanpa login. 

```
// ✅ Proteksi route
Route::middleware('auth')->group(function () {
    // Routes yang perlu login
});
```

### 3.Sertakan token CSRF di setiap _form_ untuk mencegah serangan _Cross-Site Request Forgery_.

```
<form method="POST">
    @csrf  <!-- WAJIB! -->
</form>
```

### 4. Lakukan validasi input agar data yang diterima sistem selalu sesuai format dan aman.

```
$request->validate([
    'email' => 'required|email',
    'password' => 'required|min:8',
]);
```
---
## 🏁 Kesimpulan

Melalui praktikum ini, mahasiswa dapat memahami dan mengimplementasikan sistem autentikasi modern menggunakan Laravel Breeze. Selain mempermudah pengembangan, Breeze juga memberikan gambaran nyata tentang bagaimana _framework_ Laravel mengelola proses login, _session_, dan keamanan aplikasi web. Dengan latihan ini, mahasiswa diharapkan siap mengembangkan aplikasi web yang aman, terstruktur, dan efisien.
