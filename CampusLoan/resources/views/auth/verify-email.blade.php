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
                    {{ __('Verifikasi Email Anda') }}
                </h2>
                <p class="mt-2 text-sm text-gray-500">
                    {{ __('Sebelum melanjutkan, harap periksa email Anda untuk tautan verifikasi.') }}
                </p>
            </div>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    {{ __('Terima kasih sudah mendaftar! Sebelum memulai, harap verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan melalui email. Jika Anda tidak menerima email, kami dengan senang hati akan mengirimkan yang lainnya.') }}
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mt-4 p-4 bg-green-50 rounded-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">
                                {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan selama pendaftaran.') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="mt-6 space-y-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                        {{ __('Kirim Ulang Email Verifikasi') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                        {{ __('Keluar') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
