<x-layouts.base>
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md text-center">
            <!-- Error Code -->
            <h1 class="text-8xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500 mb-4">
                429
            </h1>

            <!-- Error Title -->
            <h2 class="text-3xl font-bold text-white mb-4">
                Terlalu Banyak Permintaan
            </h2>

            <!-- Error Description -->
            <p class="text-gray-400 mb-8 leading-relaxed">
                Anda telah membuat terlalu banyak permintaan dalam waktu singkat. Silakan tunggu sebentar dan coba lagi.
            </p>

            <!-- Action Buttons -->
            <div class="flex gap-4 justify-center">
                <button onclick="setTimeout(() => { location.reload(); }, 3000);" 
                        class="px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                    Muat Ulang dalam 3 detik
                </button>
                <a href="{{ route('home') }}" 
                   class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg transition-all duration-300">
                    Kembali ke Halaman Utama
                </a>
            </div>

            <!-- Additional Info -->
            <div class="mt-12 p-6 bg-gray-900 rounded-lg border border-gray-800">
                <p class="text-gray-400 text-sm">
                    Silakan tunggu beberapa saat sebelum mencoba lagi.
                </p>
            </div>
        </div>
    </div>
</x-layouts.base>
