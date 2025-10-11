<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di LaraPress</title>
        @vite(['resources/css/main.css', 'resources/js/main.js'])
</head>
<body>
    <nav>
        <div class="logo">LaraPress</div>
        <div class="nav-link">
            <a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Tentang Kami</a>
            <a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'active' : '' }}">Kontak</a>
        </div>
    </nav>

    <div class="container">
        <h1>Kontak Tim Kami</h1>
        <div class="col">
            <div id="form">
                <form action="#" method="post">
                    <label for="nama1">Nama</label>
                    <input type="text" id="nama1" name="nama" placeholder="Masukkan nama kamu" required>

                    <label for="email1">Email</label>
                    <input type="email" id="email1" name="email" placeholder="Masukkan email kamu" required>

                    <label for="pesan1">Pesan</label>
                    <textarea id="pesan1" name="pesan" placeholder="Tulis pesan kamu..." required></textarea>

                    <button type="submit">Kirim Pesan</button>
                </form>
            </div>

            <div class="info">
                <h3>Hubungi Kami</h3>
                <p>Email: support@larapress.com</p>
                <p>Telepon: (021) 123-4567</p>
                  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.965197674812!2d110.3671!3d-7.801389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a578c0e1234ab%3A0xabcdef1234567890!2sDummy%20Location!5e0!3m2!1sid!2sid!4v1234567890123"
                    width="500" height="240" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </div>

</body>
</html>
