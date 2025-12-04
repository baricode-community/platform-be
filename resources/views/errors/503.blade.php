<x-layouts.base>
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md text-center">
            <!-- Error Code -->
            <h1 class="text-8xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-500 mb-4">
                503
            </h1>

            <!-- Error Title -->
            <h2 class="text-3xl font-bold text-white mb-4">
                Layanan Tidak Tersedia
            </h2>

            <!-- Error Description -->
            <p class="text-gray-400 mb-8 leading-relaxed">
                Server sedang dalam pemeliharaan. Kami akan kembali online dalam beberapa saat. Terima kasih atas kesabaran Anda.
            </p>

            <!-- Action Buttons -->
            <div class="flex gap-4 justify-center">
                <button onclick="location.reload()" 
                        class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-500 text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                    Coba Lagi
                </button>
                <a href="{{ route('home') }}" 
                   class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg transition-all duration-300">
                    Kembali ke Halaman Utama
                </a>
            </div>

            <!-- Additional Info -->
            <div class="mt-12 p-6 bg-gray-900 rounded-lg border border-gray-800">
                <p class="text-gray-400 text-sm">
                    Kami menghargai kesabaran Anda. Server kami sedang diperbarui.
                </p>
            </div>
        </div>
    </div>
</x-layouts.base>
