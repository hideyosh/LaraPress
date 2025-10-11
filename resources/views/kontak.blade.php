<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaraPress</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Optional: Font & Icon -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body class="font-[Poppins] bg-white text-gray-800">
    <!-- Navbar -->
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

    <!-- Contact Section -->
    <section class="max-w-6xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-10">
        <!-- Form -->
        <div class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-2xl font-semibold mb-6 text-[#f0a500]">Kontak Tim Kami</h2>
            <form action="#" method="post" class="space-y-4">
                <div>
                    <label for="nama1" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama1" name="nama" placeholder="Masukkan nama kamu" required
                           class="w-full border-gray-300 rounded-lg mt-1 focus:ring-[#f0a500] focus:border-[#f0a500]">
                </div>

                <div>
                    <label for="email1" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email1" name="email" placeholder="Masukkan email kamu" required
                           class="w-full border-gray-300 rounded-lg mt-1 focus:ring-[#f0a500] focus:border-[#f0a500]">
                </div>

                <div>
                    <label for="pesan1" class="block text-sm font-medium text-gray-700">Pesan</label>
                    <textarea id="pesan1" name="pesan" placeholder="Tulis pesan kamu..." required
                              class="w-full border-gray-300 rounded-lg mt-1 h-32 focus:ring-[#f0a500] focus:border-[#f0a500]"></textarea>
                </div>

                <button type="submit"
                        class="w-full bg-[#f0a500] text-white py-2.5 rounded-lg font-medium hover:bg-[#e29500] transition">
                    Kirim Pesan
                </button>
            </form>
        </div>

        <!-- Info -->
        <div class="flex flex-col justify-center space-y-4">
            <h3 class="text-xl font-semibold text-[#f0a500]">Hubungi Kami</h3>
            <p>Email: <span class="text-gray-700">support@larapress.com</span></p>
            <p>Telepon: <span class="text-gray-700">(021) 123-4567</span></p>

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.965197674812!2d110.3671!3d-7.801389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a578c0e1234ab%3A0xabcdef1234567890!2sDummy%20Location!5e0!3m2!1sid!2sid!4v1234567890123"
                width="100%" height="260" style="border:0;" allowfullscreen="" loading="lazy" class="rounded-lg shadow-md">
            </iframe>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 text-center py-6 mt-20">
        <p>&copy; {{ date('Y') }} <span class="text-[#f0a500] font-semibold">LaraPress</span></p>
    </footer>

    <!-- JS Libraries -->
    <script src="https://unpkg.com/preline/dist/preline.js"></script>
</body>
</html>
