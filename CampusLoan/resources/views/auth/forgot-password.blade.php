<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl">
            <div class="text-center">
                <div class="mx-auto h-16 w-16 rounded-full bg-blue-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    {{ __('Atur Ulang Kata Sandi') }}
                </h2>
                <p class="mt-2 text-sm text-gray-500">
                    {{ __('Lupa kata sandi Anda? Tidak masalah. Beri tahu kami alamat email Anda dan kami akan mengirimkan tautan pengaturan ulang kata sandi melalui email agar Anda dapat memilih yang baru.') }}
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Email') }}
                    </label>
                    <div class="relative">
                        <input
                            id="email"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="username"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-[1.02]">
                        {{ __('Kirim Tautan Atur Ulang Kata Sandi') }}
                    </button>
                </div>

                <div class="mt-4 text-center">
                    <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                        {{ __('Kembali ke Login') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
