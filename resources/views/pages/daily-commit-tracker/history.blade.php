<x-layouts.dashboard :title="__('Daily Commit Tracker History')">
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .history-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .history-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .success-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-weight: bold;
            color: white;
        }

        .success-badge-1 { background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); }
        .success-badge-2 { background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); }
        .success-badge-3 { background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); }
        .success-badge-4 { background: linear-gradient(135deg, #eab308 0%, #ca8a04 100%); }
        .success-badge-5 { background: linear-gradient(135deg, #eab308 0%, #ca8a04 100%); }
        .success-badge-6 { background: linear-gradient(135deg, #84cc16 0%, #65a30d 100%); }
        .success-badge-7 { background: linear-gradient(135deg, #84cc16 0%, #65a30d 100%); }
        .success-badge-8 { background: linear-gradient(135deg, #22c55e 0%, #15803d 100%); }
        .success-badge-9 { background: linear-gradient(135deg, #22c55e 0%, #15803d 100%); }
        .success-badge-10 { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
    </style>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-orange-600 via-amber-500 to-yellow-500 py-12 px-6">
        <div class="container mx-auto">
            <div class="flex items-center justify-between">
                <div class="text-left">
                    <h1 class="text-4xl font-bold text-white mb-2 animate-fadeInUp">
                        📚 History Commits
                    </h1>
                    <p class="text-lg text-orange-50 animate-fadeInUp" style="animation-delay: 0.1s;">
                        Lihat seluruh catatan commit harianmu dan pantau perkembangan
                    </p>
                </div>
                <a href="{{ route('daily-commit-tracker.index') }}" class="text-white hover:text-orange-100 transition-colors">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-6">
            @if ($trackers->count() > 0)
                <div class="space-y-6">
                    @foreach ($trackers as $tracker)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden history-card hover:shadow-2xl">
                            <div class="flex flex-col md:flex-row gap-6 p-8">
                                <!-- Success Level Badge -->
                                <div class="flex flex-col items-center justify-center md:border-r-2 md:border-gray-200 md:pr-6">
                                    <div class="success-badge success-badge-{{ $tracker->success_level }}">
                                        {{ $tracker->success_level }}
                                    </div>
                                    <p class="text-gray-600 text-sm mt-2 text-center">Level Keberhasilan</p>
                                </div>

                                <!-- Content -->
                                <div class="flex-1">
                                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4 mb-4">
                                        <div>
                                            <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ $tracker->title }}</h3>
                                            <p class="text-gray-500 text-sm">
                                                📅 {{ $tracker->tracked_date->format('d M Y') }}
                                                <span class="ml-2 px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-semibold">
                                                    {{ $tracker->tracked_date->format('l') }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Message -->
                                    <div class="mb-4">
                                        <p class="text-gray-700 leading-relaxed">{{ $tracker->message }}</p>
                                    </div>

                                    <!-- Impression -->
                                    <div class="bg-blue-50 rounded-lg p-4 mb-4 border-l-4 border-blue-500">
                                        <p class="text-sm font-semibold text-blue-900 mb-1">💭 Kesan Pribadi:</p>
                                        <p class="text-blue-800 text-sm">{{ $tracker->impression }}</p>
                                    </div>

                                    <!-- Footer -->
                                    <div class="flex items-center justify-between text-xs text-gray-500">
                                        <span>{{ $tracker->created_at->format('H:i') }} - {{ $tracker->created_at->diffForHumans() }}</span>
                                        @if (now()->toDateString() === $tracker->tracked_date->toDateString())
                                            <a href="{{ route('daily-commit-tracker.show', $tracker->tracked_date->toDateString()) }}" class="text-orange-600 hover:text-orange-700 font-semibold transition-colors inline-flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Lihat / Edit
                                            </a>
                                        @else
                                            <a href="{{ route('daily-commit-tracker.show', $tracker->tracked_date->toDateString()) }}" class="text-gray-500 hover:text-gray-700 font-semibold transition-colors inline-flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Lihat
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Pagination -->
                    <div class="mt-8 flex justify-center">
                        {{ $trackers->links('pagination::tailwind') }}
                    </div>
                </div>
            @else
                <div class="bg-white rounded-xl shadow-lg p-12 text-center">
                    <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-600 mb-2">Belum Ada Catatan</h3>
                    <p class="text-gray-500 mb-6">Mulai buat catatan harian commit-mu sekarang untuk memantau progress belajarmu!</p>
                    <a href="{{ route('daily-commit-tracker.index') }}" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Buat Catatan Pertama
                    </a>
                </div>
            @endif
        </div>
    </section>
</x-layouts.dashboard>
