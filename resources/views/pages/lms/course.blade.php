<x-layouts.dashboard :title="__('Baricode LMS - ' . $course->title)">
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Course Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-4xl font-bold text-white mb-2">{{ $course->title }}</h1>
                    <p class="text-purple-300">{{ $course->description }}</p>
                </div>
                @auth
                    <a href="/admin-lms/courses/{{ $course->id }}/edit"
                        class="inline-flex items-center px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-lg transition font-medium">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Edit
                    </a>
                @endauth
            </div>
        </div>

        <!-- Categories and Lessons -->
        <div class="grid gap-6">
            @forelse($categories as $category)
                <div class="bg-white/5 backdrop-blur-lg rounded-lg border border-purple-500/20 overflow-hidden">
                    <!-- Category Header -->
                    <div class="bg-gradient-to-r from-purple-700 to-indigo-700 px-6 py-4">
                        <h2 class="text-xl font-bold text-white">{{ $category->title }}</h2>
                        @if ($category->description)
                            <p class="text-purple-200 text-sm mt-1">{{ $category->description }}</p>
                        @endif
                    </div>

                    <!-- Lessons List -->
                    <div class="divide-y divide-purple-500/10">
                        @forelse($category->lessons as $lesson)
                            <a href="{{ route('lms.lesson', $lesson) }}"
                                class="block px-6 py-4 hover:bg-purple-500/10 transition group">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <h3
                                            class="text-lg font-semibold text-white group-hover:text-purple-300 transition">
                                            {{ $lesson->title }}</h3>
                                        @if ($lesson->description)
                                            <p class="text-purple-400 text-sm mt-1">{{ $lesson->description }}</p>
                                        @endif
                                    </div>
                                    <div class="ml-4 flex items-center gap-2">
                                        @auth
                                            <a href="/admin-lms/lesson/{{ $lesson->id }}/edit"
                                                class="inline-flex items-center px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-lg transition font-medium">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                                Edit
                                            </a>
                                        @endauth
                                        @if ($lesson->duration)
                                            <span
                                                class="px-3 py-1 bg-purple-500/20 text-purple-300 text-sm rounded border border-purple-500/20">
                                                {{ $lesson->duration }} min
                                            </span>
                                        @endif
                                        <svg class="w-5 h-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5.951-1.429 5.951 1.429a1 1 0 001.169-1.409l-7-14z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="px-6 py-8 text-center text-purple-400">
                                No lessons available in this category
                            </div>
                        @endforelse
                    </div>
                </div>
            @empty
                <div class="bg-white/5 backdrop-blur-lg rounded-lg border border-purple-500/20 px-6 py-12 text-center">
                    <p class="text-purple-300 text-lg">No categories available for this course yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.dashboard>
