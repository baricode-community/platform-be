<x-layouts.lms :title="__('Semua Kursus - Baricode LMS')">
    <div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-12">
            <div class="max-w-7xl mx-auto px-4">
                <h1 class="text-4xl font-bold mb-2">Jelajahi Semua Kursus 🚀</h1>
                <p class="text-blue-100 text-lg">Temukan kursus yang tepat untuk mengembangkan skill coding kamu</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 py-12">
            <!-- Search Section -->
            <div class="mb-12">
                <form action="{{ route('lms.all-courses') }}" method="GET" class="max-w-2xl">
                    <div class="relative group">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ $search }}"
                            placeholder="Cari kursus berdasarkan judul atau deskripsi..." 
                            class="w-full px-6 py-4 bg-gray-800 border-2 border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/50 transition"
                        >
                        <button 
                            type="submit"
                            class="absolute right-3 top-1/2 -translate-y-1/2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    @if($search)
                        <div class="mt-4 p-4 bg-blue-900/30 border border-blue-500/30 rounded-lg flex items-center justify-between">
                            <p class="text-blue-300">Hasil pencarian untuk: <span class="font-bold text-white">{{ $search }}</span></p>
                            <a href="{{ route('lms.all-courses') }}" class="text-blue-400 hover:text-blue-300 text-sm">Bersihkan</a>
                        </div>
                    @endif
                </form>
            </div>

            <!-- Courses Grid -->
            @if($courses->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    @foreach($courses as $course)
                        <a 
                            href="{{ route('lms.course', $course->slug) }}" 
                            class="group bg-gradient-to-br from-gray-800 to-gray-900 border border-gray-700 rounded-xl overflow-hidden hover:border-blue-500 hover:shadow-2xl hover:shadow-blue-500/20 transition duration-300 transform hover:scale-105 hover:-translate-y-1"
                        >
                            <!-- Course Header Image -->
                            <div class="relative h-48 bg-gradient-to-br from-blue-600 to-purple-600 flex items-center justify-center overflow-hidden">
                                <!-- Animated background -->
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 animate-pulse"></div>
                                </div>
                                
                                <!-- Icon -->
                                <div class="relative z-10 text-center">
                                    <svg class="w-20 h-20 text-white mx-auto mb-2 group-hover:scale-110 transition duration-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Course Info -->
                            <div class="p-6">
                                <!-- Title -->
                                <h3 class="text-lg font-bold text-white group-hover:text-blue-400 transition mb-2 line-clamp-2">
                                    {{ $course->title }}
                                </h3>

                                <!-- Description -->
                                <p class="text-gray-400 text-sm mb-4 line-clamp-2">
                                    {{ $course->description }}
                                </p>

                                <!-- Stats -->
                                <div class="flex items-center justify-between mb-4 text-xs text-gray-500">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm2 1a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2h-1zM4 8a1 1 0 001 1h6a1 1 0 100-2H5a1 1 0 00-1 1zm6 3a1 1 0 110 2h1a1 1 0 110-2h-1z"></path>
                                        </svg>
                                        {{ $course->categories->count() }} Modul
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M8.5 2a1 1 0 00-1 1v.341L6.854 2.854a1 1 0 10-1.415 1.415L6.172 5H2a1 1 0 000 2h.341L1.146 7.854a1 1 0 001.415 1.415L4.828 8H6a1 1 0 100-2H5.828L7.854 4.146a1 1 0 00-1.415-1.415L8.5 4.172V3a1 1 0 00-1-1h1zm5 2a1 1 0 00-1 1v.341l-1.854-1.854a1 1 0 10-1.415 1.415L11.172 5H7a1 1 0 000 2h.341l-1.146 1.854a1 1 0 001.415 1.415L9.828 8H11a1 1 0 100-2h-.172l2.026-2.026a1 1 0 00-1.415-1.415L13.5 4.172V3a1 1 0 00-1-1h1zm5 0a1 1 0 00-1 1v.341l-1.854-1.854a1 1 0 10-1.415 1.415L16.172 5H12a1 1 0 000 2h.341l-1.146 1.854a1 1 0 001.415 1.415L14.828 8H16a1 1 0 100-2h-.172l2.026-2.026a1 1 0 00-1.415-1.415L18.5 4.172V3a1 1 0 00-1-1h1z"></path>
                                        </svg>
                                        {{ $course->categories->sum(fn($cat) => $cat->lessons->count()) }} Lessons
                                    </span>
                                </div>

                                <!-- Badge -->
                                <div class="inline-block px-3 py-1 bg-green-900/30 border border-green-500/30 rounded-full text-green-400 text-xs font-semibold mb-4">
                                    ✓ Gratis
                                </div>

                                <!-- Footer -->
                                <div class="pt-4 border-t border-gray-700 flex items-center justify-between">
                                    <span class="text-xs text-gray-500">Klik untuk membuka →</span>
                                    <div class="group-hover:translate-x-1 transition">
                                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    <div class="flex flex-col items-center gap-6">
                        <!-- Pagination Links -->
                        <div class="flex flex-wrap gap-2 justify-center">
                            {{-- Previous Page Link --}}
                            @if ($courses->onFirstPage())
                                <button disabled class="px-4 py-2 bg-gray-700 text-gray-500 rounded-lg cursor-not-allowed opacity-50">
                                    ← Sebelumnya
                                </button>
                            @else
                                <a href="{{ $courses->previousPageUrl() }}&search={{ urlencode($search) }}" class="px-4 py-2 bg-gray-700 hover:bg-blue-600 text-white rounded-lg transition">
                                    ← Sebelumnya
                                </a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($courses->getUrlRange(1, $courses->lastPage()) as $page => $url)
                                @if ($page == $courses->currentPage())
                                    <button disabled class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold">
                                        {{ $page }}
                                    </button>
                                @else
                                    <a href="{{ $url }}&search={{ urlencode($search) }}" class="px-4 py-2 bg-gray-700 hover:bg-blue-600 text-white rounded-lg transition">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($courses->hasMorePages())
                                <a href="{{ $courses->nextPageUrl() }}&search={{ urlencode($search) }}" class="px-4 py-2 bg-gray-700 hover:bg-blue-600 text-white rounded-lg transition">
                                    Selanjutnya →
                                </a>
                            @else
                                <button disabled class="px-4 py-2 bg-gray-700 text-gray-500 rounded-lg cursor-not-allowed opacity-50">
                                    Selanjutnya →
                                </button>
                            @endif
                        </div>

                        <!-- Results Info -->
                        <p class="text-gray-400 text-sm">
                            Menampilkan <span class="text-white font-semibold">{{ $courses->firstItem() . ' - ' . $courses->lastItem() }}</span> dari <span class="text-white font-semibold">{{ $courses->total() }}</span> kursus
                        </p>
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <svg class="w-24 h-24 mx-auto text-gray-700 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-white mb-2">Tidak Ada Kursus Ditemukan</h3>
                    <p class="text-gray-400 mb-6">Maaf, tidak ada kursus yang sesuai dengan pencarian "<span class="font-semibold text-white">{{ $search }}</span>"</p>
                    <a href="{{ route('lms.all-courses') }}" class="inline-block px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">
                        Lihat Semua Kursus
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Add animations with Tailwind -->
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</x-layouts.lms>
