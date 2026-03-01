<x-layouts.lms :title="__('Baricode LMS')">

    <div class="max-w-7xl mx-auto px-4 py-12">

        <!-- Sebagian Kursus Tersedia -->
        <div>
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-white">Beberapa Kursus Tersedia</h2>
                <a href="{{ route('lms.all-courses') }}"
                    class="text-purple-300 hover:text-purple-200 text-sm transition">Jelajahi Semua Kursus →</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($courses as $course)
                    <a href="{{ route('lms.course', $course->slug) }}"
                        class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg overflow-hidden hover:shadow-xl hover:shadow-green-500/20 transition group cursor-pointer block">
                        <div
                            class="h-40 bg-gradient-to-br from-green-500/20 to-emerald-500/20 flex items-center justify-center">
                            <svg class="w-16 h-16 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-white group-hover:text-green-400 transition mb-2">
                                {{ $course->title }}</h3>
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
</x-layouts.lms>
