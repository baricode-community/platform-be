<x-layouts.lms :title="__('Baricode LMS - ' . $course->title)">
    <div class="min-h-screen bg-gray-950">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <!-- Course Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">{{ $course->title }}</h1>
                <p class="text-gray-400">{{ $course->description }}</p>
            </div>

            <!-- Categories and Lessons -->
            <div class="grid gap-6">
                @forelse($categories as $category)
                    <div class="bg-gray-900 rounded-lg border border-white/10 overflow-hidden">
                        <!-- Category Header -->
                        <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-6 py-4">
                            <h2 class="text-xl font-bold text-white">{{ $category->title }}</h2>
                            @if($category->description)
                                <p class="text-blue-100 text-sm mt-1">{{ $category->description }}</p>
                            @endif
                        </div>

                        <!-- Lessons List -->
                        <div class="divide-y divide-white/10">
                            @forelse($category->lessons as $lesson)
                                <div class="px-6 py-4 hover:bg-gray-800/50 transition">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h3 class="text-lg font-semibold text-white">{{ $lesson->title }}</h3>
                                            @if($lesson->description)
                                                <p class="text-gray-400 text-sm mt-1">{{ $lesson->description }}</p>
                                            @endif
                                        </div>
                                        @if($lesson->duration)
                                            <span class="ml-4 px-3 py-1 bg-gray-800 text-gray-300 text-sm rounded">
                                                {{ $lesson->duration }} min
                                            </span>
                                        @endif
                                    </div>
                                    @if($lesson->video_url)
                                        <div class="mt-3">
                                            <a href="{{ $lesson->video_url }}" target="_blank" class="inline-flex items-center text-blue-400 hover:text-blue-300 text-sm">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                                                </svg>
                                                Watch Video
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @empty
                                <div class="px-6 py-8 text-center text-gray-400">
                                    No lessons available in this category
                                </div>
                            @endforelse
                        </div>
                    </div>
                @empty
                    <div class="bg-gray-900 rounded-lg border border-white/10 px-6 py-12 text-center">
                        <p class="text-gray-400 text-lg">No categories available for this course yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.lms>
