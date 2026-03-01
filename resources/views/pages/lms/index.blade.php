<x-layouts.lms :title="__('Baricode LMS')">
<div class="">
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-blue-500/50 rounded-lg p-6 transition hover:shadow-xl hover:shadow-blue-500/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-300 text-sm">Total Poin</p>
                        <p class="text-3xl font-bold text-white">x</p>
                    </div>
                    <div class="bg-blue-500/20 rounded-full p-3">
                        <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg p-6 transition hover:shadow-xl hover:shadow-green-500/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-300 text-sm">Kursus Selesai</p>
                        <p class="text-3xl font-bold text-white">x</p>
                    </div>
                    <div class="bg-green-500/20 rounded-full p-3">
                        <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-yellow-500/50 rounded-lg p-6 transition hover:shadow-xl hover:shadow-yellow-500/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-300 text-sm">Sedang Belajar</p>
                        <p class="text-3xl font-bold text-white">x</p>
                    </div>
                    <div class="bg-yellow-500/20 rounded-full p-3">
                        <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 7H7v6h6V7z"></path>
                            <path fill-rule="evenodd" d="M7 2a1 1 0 012 0v1h2V2a1 1 0 112 0v1h2V2a1 1 0 112 0v1h1a2 2 0 012 2v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v2a2 2 0 01-2 2h-1v1a1 1 0 11-2 0v-1h-2v1a1 1 0 11-2 0v-1H7a2 2 0 01-2-2v-2H4a1 1 0 110-2h1V9H4a1 1 0 010-2h1V5a2 2 0 012-2h1V2zM9 5H7v2h2V5zm2 0v2h2V5h-2zm2 4h-2v2h2V9zm-2 4v-2H7v2h2z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Continue Learning & Popular Courses -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            <!-- Continue Learning -->
            <div class="lg:col-span-2">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-white">Kursus Tersedia</h2>
                    <a href="{{ route('lms.all-courses') }}" class="text-purple-300 hover:text-purple-200 text-sm transition">Lihat Semua →</a>
                </div>

                <div class="space-y-4">
                    @forelse ($courses->slice(0, 2) as $course)
                    <div class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-blue-500/50 rounded-lg p-6 hover:shadow-xl hover:shadow-blue-500/20 transition cursor-pointer group">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-white group-hover:text-blue-400 transition">{{ $course->title }}</h3>
                                <p class="text-purple-300 text-sm mt-1">{{ $course->description }}</p>
                            </div>
                            <span class="bg-blue-500/20 text-blue-300 text-xs px-3 py-1 rounded-full">{{ $course->categories->count() }} Modul</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex-1 mr-4">
                                <div class="bg-purple-900/50 rounded-full h-2">
                                    <div class="bg-blue-500 h-2 rounded-full" style="width: 0%"></div>
                                </div>
                                <p class="text-purple-400 text-xs mt-2">0% Selesai</p>
                            </div>
                            <a href="{{ route('lms.course', $course->slug) }}" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-lg text-sm transition">
                                Mulai
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="bg-white/5 border border-purple-500/20 rounded-lg p-6 text-center text-purple-300">
                        Belum ada kursus tersedia
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Recommended Courses -->
            <div>
                <h2 class="text-2xl font-bold text-white mb-6">Rekomendasi Kursus Lainnya</h2>

                <div class="space-y-4">
                    @forelse ($courses->slice(2) as $course)
                    <a href="{{ route('lms.course', $course->slug) }}" class="bg-gradient-to-br from-blue-500/10 to-indigo-500/10 border border-blue-500/20 hover:border-blue-500/50 rounded-lg p-4 hover:shadow-lg hover:shadow-blue-500/20 transition cursor-pointer group block">
                        <div class="flex items-start justify-between mb-3">
                            <h3 class="font-bold text-white group-hover:text-blue-400 transition">{{ $course->title }}</h3>
                            <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        <p class="text-purple-300 text-xs mb-3">{{ $course->categories->count() }} Modul • {{ $course->categories->sum(fn($cat) => $cat->lessons->sum('duration')) }} Jam</p>
                    </a>
                    @empty
                    <div class="bg-white/5 border border-purple-500/20 rounded-lg p-4 text-center text-purple-300 text-sm">
                        Tidak ada rekomendasi lain
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- All Available Courses -->
        <div>
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-white">Beberapa Kursus Tersedia</h2>
                <a href="{{ route('lms.all-courses') }}" class="text-purple-300 hover:text-purple-200 text-sm transition">Jelajahi Semua Kursus →</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($courses as $course)
                <a href="{{ route('lms.course', $course->slug) }}" class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg overflow-hidden hover:shadow-xl hover:shadow-green-500/20 transition group cursor-pointer block">
                    <div class="h-40 bg-gradient-to-br from-green-500/20 to-emerald-500/20 flex items-center justify-center">
                        <svg class="w-16 h-16 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-white group-hover:text-green-400 transition mb-2">{{ $course->title }}</h3>
                        <p class="text-purple-300 text-sm mb-4">{{ $course->description }}</p>
                        <div class="flex items-center justify-between text-xs text-purple-400">
                            <span>{{ $course->categories->count() }} Modul</span>
                            <span class="text-green-400">Gratis</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
</x-layouts.lms>