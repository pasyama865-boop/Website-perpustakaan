<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold">Halo, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-gray-500">
                        Status kamu: <span class="font-bold uppercase text-blue-600">{{ Auth::user()->role }}</span>
                    </p>
                </div>
            </div>

            @if(Auth::user()->role === 'admin')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-blue-600 rounded-lg shadow-lg p-6 text-white">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-500 bg-opacity-75">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold">Total Jenis Barang</h4>
                            <p class="text-3xl font-bold">{{ $totalItems }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-orange-500 rounded-lg shadow-lg p-6 text-white">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-orange-400 bg-opacity-75">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold">Sedang Dipinjam User</h4>
                            <p class="text-3xl font-bold">{{ $itemsOut }} Unit</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-bold mb-4 text-gray-700">Aksi Cepat Admin</h3>
                    <div class="flex gap-4">
                        <a href="{{ route('items.index') }}" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kelola Barang
                        </a>
                        <a href="{{ route('items.create') }}" class="border border-gray-300 hover:bg-gray-100 text-gray-700 font-bold py-2 px-4 rounded">
                            + Tambah Stok
                        </a>
                    </div>
                </div>
            </div>
            @endif

            @if(Auth::user()->role !== 'admin')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h4 class="text-gray-500 font-medium">Barang yang sedang kamu bawa</h4>
                        <div class="mt-2 flex items-baseline">
                            <span class="text-4xl font-extrabold tracking-tight {{ $myActiveLoans > 0 ? 'text-red-600' : 'text-green-600' }}">
                                {{ $myActiveLoans }}
                            </span>
                            <span class="ml-1 text-xl font-semibold text-gray-500">Unit</span>
                        </div>

                        @if($myActiveLoans > 0)
                            <p class="mt-2 text-sm text-red-500">⚠️ Segera kembalikan sebelum tenggat waktu!</p>
                            <div class="mt-4">
                                <a href="{{ route('loans.index') }}" class="text-indigo-600 hover:text-indigo-900 font-bold">
                                    Lihat Detail &rarr;
                                </a>
                            </div>
                        @else
                            <p class="mt-2 text-sm text-green-500">✅ Kamu tidak punya tanggungan pinjaman.</p>
                        @endif
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col justify-center items-center p-6 text-center">
                    <h4 class="text-lg font-bold text-gray-700 mb-2">Butuh Peralatan?</h4>
                    <p class="text-gray-500 mb-4 text-sm">Cari barang yang tersedia dan ajukan peminjaman sekarang.</p>
                    <a href="{{ route('loans.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full shadow-lg transition transform hover:scale-105">
                        Pinjam Barang Baru
                    </a>
                </div>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>
