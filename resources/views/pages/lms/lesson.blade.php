<x-layouts.lms :title="__('Baricode LMS - ' . $lesson->title)">
    <div class="min-h-screen bg-gray-950">
        <div class="max-w-6xl mx-auto px-4 py-8">
            <!-- Breadcrumb -->
            <div class="mb-6 flex items-center text-sm text-gray-400">
                <a href="{{ route('lms.index') }}" class="hover:text-white transition">LMS</a>
                <span class="mx-2">/</span>
                <a href="{{ route('lms.course', $course->slug) }}" class="hover:text-white transition">{{ $course->title }}</a>
                <span class="mx-2">/</span>
                <span class="text-gray-300">{{ $category->title }}</span>
                <span class="mx-2">/</span>
                <span class="text-blue-400">{{ $lesson->title }}</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Videos Section -->
                    @if($youtubeVideos->count() > 0)
                        <div class="mb-6">
                            <!-- Main Video Player -->
                            <div class="bg-gray-900 rounded-lg border border-white/10 overflow-hidden mb-4" x-data="videoPlayer()" x-init="init()">
                                <div class="relative w-full aspect-video bg-gray-800">
                                    <iframe 
                                        class="w-full h-full"
                                        :src="getEmbedUrl(currentVideo.youtube_url)"
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen" 
                                        allowfullscreen
                                        :title="currentVideo.title">
                                    </iframe>
                                </div>

                                <!-- Video Title -->
                                <div class="p-4 border-b border-white/10">
                                    <h3 class="text-lg font-bold text-white" x-text="currentVideo.title"></h3>
                                </div>

                                <!-- Video Description -->
                                <template x-if="currentVideo.description">
                                    <div class="p-4 bg-gray-800/50 text-gray-300 text-sm" x-text="currentVideo.description"></div>
                                </template>

                                <!-- Video Alternatives Selector -->
                                @if($youtubeVideos->count() > 1)
                                    <div class="p-4 bg-gradient-to-r from-blue-900/20 to-purple-900/20 border-t border-white/10">
                                        <div class="flex items-start gap-3 mb-4">
                                            <svg class="w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                                            </svg>
                                            <div>
                                                <p class="text-sm text-gray-200 font-semibold">Pilihan Video Pembelajaran</p>
                                                <p class="text-xs text-gray-400 mt-1">Tersedia {{ $youtubeVideos->count() }} video. Silahkan pilih salah satu untuk memulai pembelajaran (atau sesuai arahan yang disediakan).</p>
                                            </div>
                                        </div>
                                        
                                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                                            @foreach($youtubeVideos as $index => $video)
                                                <button
                                                    @click="selectVideo({{ $index }})"
                                                    :class="activeIndex === {{ $index }} ? 'bg-blue-600 border-blue-400 ring-2 ring-blue-400/50' : 'bg-gray-800 border-gray-700 hover:bg-gray-700 hover:border-gray-600'"
                                                    class="px-3 py-2 rounded-lg border transition text-xs text-gray-300 hover:text-white truncate font-medium"
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
                                                // Initialize with first video
                                                this.activeIndex = 0;
                                            },
                                            selectVideo(index) {
                                                this.activeIndex = index;
                                            },
                                            getEmbedUrl(url) {
                                                if (!url) return '';
                                                // Convert youtube URL to embed URL
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
                        <div class="bg-gray-900 rounded-lg border border-white/10 px-6 py-12 text-center mb-6">
                            <svg class="w-16 h-16 mx-auto text-gray-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-gray-400">No videos available for this lesson yet.</p>
                        </div>
                    @endif

                    <!-- Lesson Title and Metadata -->
                    <div class="bg-gray-900 rounded-lg border border-white/10 p-6 mb-6">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <h1 class="text-3xl font-bold text-white">{{ $lesson->title }}</h1>
                                <p class="text-gray-400 mt-2">{{ $lesson->description }}</p>
                            </div>
                            @if($lesson->duration)
                                <div class="px-4 py-2 bg-blue-900/50 rounded-lg">
                                    <p class="text-blue-300 font-semibold">{{ $lesson->duration }} min</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Lesson Content -->
                    @if($lesson->content)
                        <div class="bg-gray-900 rounded-lg border border-white/10 p-6 mb-6">
                            <div class="prose prose-invert max-w-none">
                                {!! $lesson->content !!}
                            </div>
                        </div>
                    @endif

                    <!-- Navigation Buttons -->
                    <div class="flex gap-4">
                        @if($prevLesson)
                            <a href="{{ route('lms.lesson', $prevLesson) }}" 
                                class="flex items-center px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg transition">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Previous: {{ $prevLesson->title }}
                            </a>
                        @else
                            <button disabled class="flex items-center px-4 py-2 bg-gray-800/50 text-gray-600 rounded-lg opacity-50 cursor-not-allowed">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Previous
                            </button>
                        @endif

                        <a href="{{ route('lms.course', $course->slug) }}" 
                            class="flex-1 flex items-center justify-center px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Back to Course
                        </a>

                        @if($nextLesson)
                            <a href="{{ route('lms.lesson', $nextLesson) }}" 
                                class="flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">
                                Next: {{ $nextLesson->title }}
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        @else
                            <button disabled class="flex items-center px-4 py-2 bg-gray-800/50 text-gray-600 rounded-lg opacity-50 cursor-not-allowed">
                                Next
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div>
                    <!-- Course Info Card -->
                    <div class="bg-gray-900 rounded-lg border border-white/10 p-6 mb-6 sticky top-6">
                        <h3 class="text-lg font-bold text-white mb-4">Course Info</h3>
                        
                        <div class="mb-4">
                            <p class="text-sm text-gray-400 mb-1">Course</p>
                            <p class="text-white font-semibold">{{ $course->title }}</p>
                        </div>

                        <div class="mb-4">
                            <p class="text-sm text-gray-400 mb-1">Category</p>
                            <p class="text-white font-semibold">{{ $category->title }}</p>
                        </div>

                        <div class="mb-4 pb-4 border-b border-white/10">
                            <p class="text-sm text-gray-400 mb-1">Progress</p>
                            <div class="flex items-center gap-2">
                                <div class="flex-1 bg-gray-800 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: 45%"></div>
                                </div>
                                <span class="text-sm text-gray-300">45%</span>
                            </div>
                        </div>

                        <!-- Related Lessons -->
                        <h4 class="text-white font-semibold mb-3">Lessons in this Category</h4>
                        <div class="space-y-2">
                            <ol class="list-decimal list-inside space-y-2">
                                @foreach($category->lessons()->where('is_published', true)->orderBy('order')->get() as $relatedLesson)
                                    <li>
                                        <a href="{{ route('lms.lesson', $relatedLesson) }}" 
                                            class="{{ $relatedLesson->id === $lesson->id ? 'text-blue-300 font-semibold' : 'text-gray-300 hover:text-white' }} transition text-sm">
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
    </div>
</x-layouts.lms>
