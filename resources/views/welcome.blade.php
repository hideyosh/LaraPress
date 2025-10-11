<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di LaraPress</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Optional: Font & Icon -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800 font-[Poppins]">

    <!-- 🔹 Navbar -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
            <div class="text-2xl font-semibold text-[#f0a500]">
                LaraPress
            </div>
            <div class="flex items-center gap-x-6">
                <a href="{{ route('welcome') }}"
                   class="text-gray-600 hover:text-[#f0a500] transition {{ request()->routeIs('welcome') ? 'font-semibold text-[#f0a500]' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('about') }}"
                   class="text-gray-600 hover:text-[#f0a500] transition {{ request()->routeIs('about') ? 'font-semibold text-[#f0a500]' : '' }}">
                    Tentang Kami
                </a>
                <a href="{{ route('kontak') }}"
                   class="text-gray-600 hover:text-[#f0a500] transition {{ request()->routeIs('kontak') ? 'font-semibold text-[#f0a500]' : '' }}">
                    Kontak
                </a>

                <a href="{{ route('login') }}"
                   class="py-2.5 px-5 rounded-lg border border-[#f0a500] text-[#f0a500] hover:bg-[#f0a500] hover:text-white transition duration-200 font-medium">
                    Login
                </a>
            </div>
        </div>
    </nav>

    <!-- 🔹 Hero Section -->
    <section class="flex flex-col justify-center items-center text-center py-24 px-6 bg-gradient-to-b from-white to-gray-100">
        <h1 class="text-4xl md:text-5xl font-bold text-[#333] mb-4">
            Selamat Datang di <span class="text-[#f0a500]">LaraPress</span>
        </h1>
        <p class="text-gray-600 max-w-2xl">
            Ini adalah halaman utama dari aplikasi blog kita — tempat berbagi ide, cerita, dan inspirasi menggunakan kekuatan Laravel & Tailwind CSS.
        </p>
        <a href="{{ route('login') }}"
           class="mt-8 inline-block bg-[#f0a500] text-white px-6 py-3 rounded-lg shadow-md hover:bg-[#e29500] transition">
            Mulai Sekarang
        </a>
    </section>

    <!-- 🔹 Footer -->
    <footer class="bg-gray-800 text-gray-300 text-center py-6 mt-20">
        <p>&copy; {{ date('Y') }} <span class="text-[#f0a500] font-semibold">LaraPress</span></p>
    </footer>

    <!-- JS Libraries -->
    <script src="https://unpkg.com/preline/dist/preline.js"></script>
</body>
</html>
