<x-layouts.base>
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md text-center">
            <!-- Error Code -->
            <h1 class="text-8xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-red-500 mb-4">
                500
            </h1>

            <!-- Error Title -->
            <h2 class="text-3xl font-bold text-white mb-4">
                Kesalahan Server Internal
            </h2>

            <!-- Error Description -->
            <p class="text-gray-400 mb-8 leading-relaxed">
                Terjadi kesalahan pada server kami. Tim kami telah diberitahu dan sedang bekerja untuk memperbaikinya. Silakan coba lagi dalam beberapa saat.
            </p>

            <!-- Action Buttons -->
            <div class="flex gap-4 justify-center">
                <a href="{{ route('home') }}" 
                   class="px-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                    Kembali ke Halaman Utama
                </a>
                <button onclick="location.reload()" 
                        class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg transition-all duration-300">
                    Muat Ulang
                </button>
            </div>

            <!-- Additional Info -->
            <div class="mt-12 p-6 bg-gray-900 rounded-lg border border-gray-800">
                <p class="text-gray-400 text-sm">
                    Error ID: <span class="text-gray-300 font-mono">{{ \Illuminate\Support\Str::uuid() }}</span>
                </p>
            </div>
        </div>
    </div>
</x-layouts.base>
