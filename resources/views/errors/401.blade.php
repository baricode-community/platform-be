<x-layouts.base>
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md text-center">
            <!-- Error Code -->
            <h1 class="text-8xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-500 mb-4">
                401
            </h1>

            <!-- Error Title -->
            <h2 class="text-3xl font-bold text-white mb-4">
                Autentikasi Diperlukan
            </h2>

            <!-- Error Description -->
            <p class="text-gray-400 mb-8 leading-relaxed">
                Anda harus login untuk mengakses halaman ini. Silakan masukkan kredensial Anda untuk melanjutkan.
            </p>

            <!-- Action Buttons -->
            <div class="flex gap-4 justify-center">
                <a href="{{ route('login') }}" 
                   class="px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                    Login Sekarang
                </a>
                <a href="{{ route('home') }}" 
                   class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg transition-all duration-300">
                    Kembali ke Halaman Utama
                </a>
            </div>

            <!-- Additional Info -->
            <div class="mt-12 p-6 bg-gray-900 rounded-lg border border-gray-800">
                <p class="text-gray-400 text-sm">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 font-semibold">Daftar di sini</a>
                </p>
            </div>
        </div>
    </div>
</x-layouts.base>
