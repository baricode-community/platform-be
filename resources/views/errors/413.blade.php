<x-layouts.base>
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md text-center">
            <!-- Error Code -->
            <h1 class="text-8xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-500 to-yellow-500 mb-4">
                413
            </h1>

            <!-- Error Title -->
            <h2 class="text-3xl font-bold text-white mb-4">
                Payload Terlalu Besar
            </h2>

            <!-- Error Description -->
            <p class="text-gray-400 mb-8 leading-relaxed">
                File atau data yang Anda coba upload terlalu besar. Silakan kurangi ukurannya dan coba lagi.
            </p>

            <!-- Action Buttons -->
            <div class="flex gap-4 justify-center">
                <button onclick="history.back()" 
                        class="px-6 py-3 bg-gradient-to-r from-amber-500 to-yellow-500 text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                    Kembali
                </button>
                <a href="{{ route('home') }}" 
                   class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg transition-all duration-300">
                    Ke Halaman Utama
                </a>
            </div>

            <!-- Additional Info -->
            <div class="mt-12 p-6 bg-gray-900 rounded-lg border border-gray-800">
                <p class="text-gray-400 text-sm">
                    Ukuran maksimal file yang diizinkan dapat berbeda-beda sesuai jenis file.
                </p>
            </div>
        </div>
    </div>
</x-layouts.base>
