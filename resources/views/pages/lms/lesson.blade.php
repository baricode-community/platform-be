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
                        <div class="space-y-6 mb-6">
                            @foreach($youtubeVideos as $index => $video)
                                <div class="bg-gray-900 rounded-lg border border-white/10 overflow-hidden">
                                    <!-- Video Player -->
                                    <div class="relative w-full aspect-video bg-gray-800">
                                        <iframe 
                                            class="w-full h-full"
                                            src="{{ collect(explode('?', str_replace(['youtube.com/watch?v=', 'youtu.be/'], ['youtube.com/embed/', 'youtube.com/embed/'], $video->youtube_url)))->first() }}?fs=1&showinfo=0&rel=0"
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen" 
                                            allowfullscreen
                                            title="{{ $video->title }}">
                                        </iframe>
                                    </div>

                                    <!-- Video Info -->
                                    <div class="p-6">
                                        <div class="flex items-start justify-between mb-3">
                                            <div>
                                                <h3 class="text-lg font-bold text-white">{{ $video->title }}</h3>
                                                <p class="text-gray-400 text-sm mt-1">Video {{ $index + 1 }} of {{ $youtubeVideos->count() }}</p>
                                            </div>
                                        </div>
                                        @if($video->description)
                                            <p class="text-gray-300">{{ $video->description }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
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
                            @foreach($category->lessons()->where('is_published', true)->orderBy('order')->get() as $relatedLesson)
                                <a href="{{ route('lms.lesson', $relatedLesson) }}" 
                                    class="block p-2 rounded {{ $relatedLesson->id === $lesson->id ? 'bg-blue-600/20 border border-blue-500 text-blue-300' : 'bg-gray-800 hover:bg-gray-700 text-gray-300' }} transition text-sm">
                                    {{ $relatedLesson->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.lms>
