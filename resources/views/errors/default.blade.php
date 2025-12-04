<x-layouts.base>
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md text-center">
            <!-- Error Code -->
            <h1 class="text-8xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-gray-500 to-slate-500 mb-4">
                ⚠️
            </h1>

            <!-- Error Title -->
            <h2 class="text-3xl font-bold text-white mb-4">
                Terjadi Kesalahan
            </h2>

            <!-- Error Description -->
            <p class="text-gray-400 mb-8 leading-relaxed">
                Maaf, terjadi kesalahan yang tidak terduga. Kami sedang memperbaikinya.
                @if ($exception->getStatusCode())
                    <br><span class="text-sm text-gray-500">(Kode Error: {{ $exception->getStatusCode() }})</span>
                @endif
            </p>

            <!-- Action Buttons -->
            <div class="flex gap-4 justify-center">
                <a href="{{ route('home') }}" 
                   class="px-6 py-3 bg-gradient-to-r from-gray-600 to-slate-600 text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                    Kembali ke Halaman Utama
                </a>
                <button onclick="history.back()" 
                        class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg transition-all duration-300">
                    Kembali
                </button>
            </div>

            <!-- Additional Info -->
            <div class="mt-12 p-6 bg-gray-900 rounded-lg border border-gray-800">
                <p class="text-gray-400 text-sm">
                    Hubungi tim support kami jika masalah berlanjut.
                </p>
            </div>
        </div>
    </div>
</x-layouts.base>
