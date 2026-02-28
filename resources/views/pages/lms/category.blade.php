<x-layouts.lms :title="__('Baricode LMS - ' . $category->title)">
    <div class="min-h-screen bg-gray-950">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <!-- Breadcrumb -->
            <div class="mb-6 flex items-center text-sm text-gray-400">
                <a href="{{ route('lms.index') }}" class="text-blue-400 hover:text-blue-300 transition">LMS</a>
                <span class="mx-2">/</span>
                <a href="{{ route('lms.course', $course->slug) }}" class="text-blue-400 hover:text-blue-300 transition">{{ $course->title }}</a>
                <span class="mx-2">/</span>
                <span class="text-gray-400">{{ $category->title }}</span>
            </div>

            <!-- Category Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">{{ $category->title }}</h1>
                @if($category->description)
                    <p class="text-gray-400 text-lg">{{ $category->description }}</p>
                @endif
            </div>

            <!-- Course Info Card -->
            <div class="bg-gradient-to-r from-blue-900/30 to-purple-900/30 border border-blue-800/50 rounded-lg px-6 py-4 mb-8">
                <div class="flex items-center gap-2 mb-2">
                    <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.3A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"></path>
                    </svg>
                    <span class="text-blue-300 font-semibold">Course: {{ $course->title }}</span>
                </div>
            </div>

            <!-- Lessons List -->
            <div>
                <h2 class="text-2xl font-bold text-white mb-6">Lessons</h2>
                
                <div class="grid gap-4">
                    @forelse($lessons as $index => $lesson)
                        <a href="{{ route('lms.lesson', $lesson) }}" class="bg-gray-900 rounded-lg border border-white/10 hover:border-blue-500/50 px-6 py-6 transition group">
                            <div class="flex items-start justify-between">
                                <div class="flex items-start gap-4 flex-1">
                                    <!-- Lesson Number -->
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 text-white font-bold">
                                            {{ $loop->iteration }}
                                        </div>
                                    </div>

                                    <!-- Lesson Info -->
                                    <div class="flex-1">
                                        <h3 class="text-xl font-semibold text-white group-hover:text-blue-400 transition">{{ $lesson->title }}</h3>
                                        @if($lesson->description)
                                            <p class="text-gray-400 text-sm mt-2">{{ $lesson->description }}</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Duration and Arrow -->
                                <div class="ml-4 flex items-center gap-3">
                                    @if($lesson->duration)
                                        <span class="px-3 py-1 bg-gray-800 text-gray-300 text-sm rounded whitespace-nowrap">
                                            {{ $lesson->duration }} min
                                        </span>
                                    @endif
                                    <svg class="w-5 h-5 text-gray-500 group-hover:text-blue-400 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="bg-gray-900 rounded-lg border border-white/10 px-6 py-12 text-center">
                            <svg class="w-16 h-16 mx-auto text-gray-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="text-gray-400 text-lg">No lessons available in this category yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Navigation -->
            <div class="mt-12">
                <a href="{{ route('lms.course', $course->slug) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Course
                </a>
            </div>
        </div>
    </div>
</x-layouts.lms>
