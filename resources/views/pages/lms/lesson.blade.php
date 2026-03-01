<x-layouts.lms :title="__('Baricode LMS - ' . $lesson->title)">
    <div class="p-2">
        <!-- Breadcrumb -->
        <div class="mb-6 flex items-center text-sm text-purple-400">
            <a href="{{ route('lms.course', $course->slug) }}" class="text-purple-300 hover:text-white transition">{{ $course->title }}</a>
            <span class="mx-2">/</span>
            <a href="{{ route('lms.category', $category->slug) }}" class="text-purple-300 hover:text-white transition">{{ $category->title }}</a>
            <span class="mx-2">/</span>
            <span class="text-purple-500">{{ $lesson->title }}</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Konten Utama -->
            <div class="lg:col-span-2">
                <!-- Judul Pelajaran dan Metadata -->
                <div class="bg-white/5 backdrop-blur-lg rounded-lg border border-purple-500/20 p-6 mb-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h1 class="text-3xl font-bold text-white">{{ $lesson->title }}</h1>
                            <p class="text-purple-300 mt-2">{{ $lesson->description }}</p>
                        </div>
                        @if($lesson->duration)
                            <div class="px-4 py-2 bg-purple-500/20 border border-purple-500/30 rounded-lg">
                                <p class="text-purple-300 font-semibold">{{ $lesson->duration }} menit</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Bagian Video -->
                @if($youtubeVideos->count() > 0)
                    <div class="mb-6">
                        <div class="bg-white/5 backdrop-blur-lg rounded-lg border border-purple-500/20 overflow-hidden mb-4" x-data="videoPlayer()" x-init="init()">
                            <div class="relative w-full aspect-video bg-black">
                                <iframe
                                    class="w-full h-full"
                                    :src="getEmbedUrl(currentVideo.youtube_url)"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen"
                                    allowfullscreen
                                    :title="currentVideo.title">
                                </iframe>
                            </div>

                            <!-- Judul Video -->
                            <div class="p-4 border-b border-purple-500/10">
                                <h3 class="text-lg font-bold text-white" x-text="currentVideo.title"></h3>
                            </div>

                            <!-- Deskripsi Video -->
                            <template x-if="currentVideo.description">
                                <div class="p-4 bg-purple-500/5 text-purple-300 text-sm" x-text="currentVideo.description"></div>
                            </template>

                            <!-- Pemilih Video Alternatif -->
                            @if($youtubeVideos->count() > 1)
                                <div class="p-4 bg-gradient-to-r from-purple-500/10 to-indigo-500/10 border-t border-purple-500/10">
                                    <div class="flex items-start gap-3 mb-4">
                                        <svg class="w-5 h-5 text-purple-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-sm text-white font-semibold">Pilihan Video Pembelajaran</p>
                                            <p class="text-xs text-purple-400 mt-1">Tersedia {{ $youtubeVideos->count() }} video. Silakan pilih salah satu untuk memulai pembelajaran (atau sesuai arahan yang disediakan).</p>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                                        @foreach($youtubeVideos as $index => $video)
                                            <button
                                                @click="selectVideo({{ $index }})"
                                                :class="activeIndex === {{ $index }} ? 'bg-purple-600 border-purple-400 ring-2 ring-purple-400/50' : 'bg-white/5 border-purple-500/20 hover:bg-purple-500/20 hover:border-purple-500/40'"
                                                class="px-3 py-2 rounded-lg border transition text-xs text-purple-300 hover:text-white truncate font-medium"
                                                :title="videos[{{ $index }}].title"
                                            >
                                                <span class="inline-block w-4 text-center">{{ $index + 1 }}</span>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <script>
                                function videoPlayer() {
                                    return {
                                        activeIndex: 0,
                                        videos: {!! json_encode($youtubeVideos->map(fn($v) => [
                                            'title' => $v->title,
                                            'description' => $v->description,
                                            'youtube_url' => $v->youtube_url
                                        ])->values()) !!},
                                        get currentVideo() {
                                            return this.videos[this.activeIndex] || {};
                                        },
                                        init() {
                                            this.activeIndex = 0;
                                        },
                                        selectVideo(index) {
                                            this.activeIndex = index;
                                        },
                                        getEmbedUrl(url) {
                                            if (!url) return '';
                                            let embedUrl = url
                                                .replace(/youtube\.com\/watch\?v=/, 'youtube.com/embed/')
                                                .replace(/youtu\.be\//, 'youtube.com/embed/')
                                                .split('?')[0];
                                            return embedUrl + '?fs=1&showinfo=0&rel=0';
                                        }
                                    }
                                }
                            </script>
                        </div>
                    </div>
                @else
                    <div class="bg-white/5 backdrop-blur-lg rounded-lg border border-purple-500/20 px-6 py-12 text-center mb-6">
                        <svg class="w-16 h-16 mx-auto text-purple-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-purple-400">Belum ada video untuk pelajaran ini.</p>
                    </div>
                @endif

                <!-- Konten Pelajaran -->
                @if($lesson->content)
                    <div class="bg-white/5 backdrop-blur-lg rounded-lg border border-purple-500/20 p-6 mb-6">
                        <div class="prose prose-invert max-w-none">
                            {!! $lesson->content !!}
                        </div>
                    </div>
                @endif

                <!-- Tombol Navigasi -->
                <div class="flex gap-4">
                    @if($prevLesson)
                        <a href="{{ route('lms.lesson', $prevLesson) }}"
                            class="flex items-center px-4 py-2 bg-white/5 border border-purple-500/20 hover:bg-purple-500/20 text-white rounded-lg transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Sebelumnya
                        </a>
                    @else
                        <button disabled class="flex items-center px-4 py-2 bg-white/5 text-purple-700 rounded-lg opacity-50 cursor-not-allowed">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Sebelumnya
                        </button>
                    @endif

                    @if($nextLesson)
                        <a href="{{ route('lms.lesson', $nextLesson) }}"
                            class="flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-500 text-white rounded-lg transition">
                            Selanjutnya
                        </a>
                    @else
                        <button disabled class="flex items-center px-4 py-2 bg-white/5 text-purple-700 rounded-lg opacity-50 cursor-not-allowed">
                            Selanjutnya
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div>
                <div class="bg-white/5 backdrop-blur-lg rounded-lg border border-purple-500/20 p-6 mb-6 sticky top-6">
                    <h3 class="text-lg font-bold text-white mb-4">Informasi Kursus</h3>

                    <div class="mb-4">
                        <p class="text-sm text-purple-400 mb-1">Kursus</p>
                        <p class="text-white font-semibold">{{ $course->title }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-sm text-purple-400 mb-1">Kategori</p>
                        <p class="text-white font-semibold">{{ $category->title }}</p>
                    </div>

                    <div class="mb-4 pb-4 border-b border-purple-500/20">
                        <p class="text-sm text-purple-400 mb-1">Progres</p>
                        <div class="flex items-center gap-2">
                            <div class="flex-1 bg-purple-900/50 rounded-full h-2">
                                <div class="bg-purple-500 h-2 rounded-full" style="width: 45%"></div>
                            </div>
                            <span class="text-sm text-purple-300">45%</span>
                        </div>
                        <p class="text-xs text-purple-500 mt-2 italic">Fitur progres akan segera hadir</p>
                    </div>

                    <!-- Pelajaran Terkait -->
                    <h4 class="text-white font-semibold mb-3">Pelajaran dalam Kategori Ini</h4>
                    <div class="space-y-2">
                        <ol class="list-decimal list-inside space-y-2">
                            @foreach($category->lessons()->where('is_published', true)->orderBy('order')->get() as $relatedLesson)
                                <li>
                                    <a href="{{ route('lms.lesson', $relatedLesson) }}"
                                        class="{{ $relatedLesson->id === $lesson->id ? 'text-purple-300 font-semibold' : 'text-purple-400 hover:text-white' }} transition text-sm">
                                        {{ $relatedLesson->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.lms>