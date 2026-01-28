<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl">
            <div class="text-center">
                <div class="mx-auto h-16 w-16 rounded-full bg-blue-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    {{ __('Selamat Datang Kembali!') }}
                </h2>
                <p class="mt-2 text-sm text-gray-500">
                    {{ __('Masuk ke akun Anda untuk melanjutkan') }}
                </p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

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

                <div class="mt-4" x-data="{ show: false }">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('Kata Sandi') }}
                    </label>

                    <div class="relative">
                        <input
                            id="password"
                            :type="show ? 'text' : 'password'"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="block w-full px-4 py-3 pr-10 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        />

                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg x-show="!show" class="h-5 w-5 text-gray-500 hover:text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>

                            <svg x-show="show" style="display: none;" class="h-5 w-5 text-gray-500 hover:text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 011.574-2.59M5.22 5.22a3 3 0 00-4.004 4.004M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" name="remember">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                            {{ __('Ingat Saya') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="text-sm font-medium text-blue-600 hover:text-blue-800" href="{{ route('password.request') }}">
                            {{ __('Lupa kata sandi Anda?') }}
                        </a>
                    @endif
                </div>

                <div class="mt-6">
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-[1.02]">
                        {{ __('Masuk') }}
                    </button>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        {{ __('Belum punya akun?') }}
                        <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-800">
                            {{ __('Daftar') }}
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
