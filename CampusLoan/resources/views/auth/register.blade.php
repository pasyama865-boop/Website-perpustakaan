<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl">
            <div class="text-center">
                <div class="mx-auto h-16 w-16 rounded-full bg-blue-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    {{ __('Buat Akun') }}
                </h2>
                <p class="mt-2 text-sm text-gray-500">
                    {{ __('Mulai dengan akun gratis Anda') }}
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mt-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Nama') }}
                    </label>
                    <div class="relative">
                        <input
                            id="name"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
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
                            autocomplete="username"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Kata Sandi') }}
                    </label>
                    <div class="relative">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            class="block w-full px-4 py-3 pr-10 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Konfirmasi Kata Sandi') }}
                    </label>
                    <div class="relative">
                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            class="block w-full px-4 py-3 pr-10 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-[1.02]">
                        {{ __('Daftar') }}
                    </button>
                </div>

                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">
                        {{ __('Sudah memiliki akun?') }}
                        <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-800">
                            {{ __('Masuk') }}
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
