<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CampusLoan - Pinjam Fasilitas Kampus</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans bg-gray-50 text-gray-900">

    <nav class="flex items-center justify-between px-6 py-4 bg-white shadow-sm sticky top-0 z-50">
        <div class="flex items-center gap-2">
            <div class="bg-blue-600 text-white p-2 rounded-lg font-bold text-xl">CL</div>
            <span class="text-xl font-bold text-gray-800 tracking-tight">CampusLoan</span>
        </div>

        <div class="hidden md:flex items-center gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-blue-600 font-semibold transition">Dashboard</a>
                    <a href="{{ url('/loans') }}" class="bg-blue-600 text-white px-5 py-2 rounded-full font-semibold hover:bg-blue-700 transition shadow-md">
                        Pinjam Sekarang
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 font-semibold transition">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-gray-900 text-white px-5 py-2 rounded-full font-semibold hover:bg-gray-800 transition shadow-md">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <header class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="50,0 100,0 50,100 0,100" />
                </svg>

                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Pinjam Fasilitas Kampus</span>
                            <span class="block text-blue-600 xl:inline">Jadi Lebih Mudah</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Lupakan formulir kertas yang ribet. Cek ketersediaan barang, ajukan peminjaman, dan kelola pengembalian dalam satu aplikasi digital.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                @auth
                                    <a href="{{ url('/loans') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10 transition">
                                        Mulai Pinjam
                                    </a>
                                @else
                                    <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10 transition">
                                        Daftar Sekarang
                                    </a>
                                @endauth
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="#features" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 md:py-4 md:text-lg md:px-10 transition">
                                    Pelajari Dulu
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-gray-100 flex items-center justify-center">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full opacity-80" src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80" alt="Mahasiswa coding">
        </div>
    </header>

    <section id="features" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Keunggulan</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Kenapa pakai CampusLoan?
                </p>
            </div>

            <div class="mt-10">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">

                    <div class="relative bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Proses Cepat</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            Tidak perlu menunggu admin manual. Cek stok barang secara real-time dan ajukan peminjaman detik itu juga.
                        </dd>
                    </div>

                    <div class="relative bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Stok Akurat</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            Sistem otomatis mengurangi stok saat dipinjam dan menambah saat dikembalikan. Tidak ada lagi drama barang selisih.
                        </dd>
                    </div>

                    <div class="relative bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Riwayat Jelas</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            Semua jejak peminjamanmu terekam rapi. Kamu bisa melihat apa saja yang pernah kamu pinjam sebelumnya.
                        </dd>
                    </div>

                </dl>
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
            <div class="flex justify-center space-x-6 md:order-2">
                <a href="#" class="text-gray-400 hover:text-gray-500">Tentang Kami</a>
                <a href="#" class="text-gray-400 hover:text-gray-500">Kontak</a>
            </div>
            <div class="mt-8 md:mt-0 md:order-1">
                <p class="text-center text-base text-gray-400">
                    &copy; 2026 CampusLoan Inc. All rights reserved. Built with Laravel.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>
