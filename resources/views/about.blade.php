<!DOCTYPE html>
<html>
<head>
    <title>Tentang Kami - LaraPress</title>
    @vite(['resources/css/main.css', 'resources/js/main.js'])
</head>
<body>
    <nav>
        <div class="logo">
            LaraPress
        </div>
        <div class="nav-link">
            <a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Tentang Kami</a>
            <a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'active' : '' }}">Kontak</a>
        </div>
    </nav>
    <div class="main">
         <h1>Tentang LaraPress</h1>
        <p>LaraPress adalah sebuah proyek blog sederhana yang dibuat untuk mempelajari dasar-dasar framework Laravel 12.</p>
    </div>
</body>
</html>
