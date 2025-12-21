<x-layouts.dashboard :title="__('Daily Commit Tracker')">
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

        .tracker-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .tracker-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .success-bar {
            background: linear-gradient(to right, #ef4444, #f97316, #eab308, #22c55e);
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
        }

        .success-level {
            transition: width 0.3s ease;
        }
    </style>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-orange-600 via-amber-500 to-yellow-500 py-12 px-6">
        <div class="container mx-auto">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-4 animate-fadeInUp">
                    📝 Daily Commit Tracker
                </h1>
                <p class="text-lg text-orange-50 animate-fadeInUp" style="animation-delay: 0.1s;">
                    Pantau progress belajarmu setiap hari dan bangun kebiasaan coding yang konsisten
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Form Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-orange-500 to-amber-600 px-8 py-6">
                            <h2 class="text-2xl font-bold text-white">📋 Catat Progress Harimu</h2>
                            <p class="text-orange-50 mt-1">Isi catatan pribadi dengan detail tentang progress belajarmu hari ini</p>
                        </div>
                        
                        <div class="p-8">
                            @livewire('daily-commit-tracker-form')
                        </div>
                    </div>
                </div>

                <!-- Sidebar Section -->
                <div class="space-y-6">
                    <!-- Stats Card -->
                    <div class="bg-white rounded-xl shadow-lg p-6 tracker-card">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">📊 Statistik Anda</h3>
                        <div class="space-y-4">
                            <div class="border-l-4 border-orange-500 pl-4 py-2">
                                <p class="text-gray-600 text-sm">Total Commits</p>
                                <p class="text-2xl font-bold text-orange-600">0</p>
                            </div>
                            <div class="border-l-4 border-amber-500 pl-4 py-2">
                                <p class="text-gray-600 text-sm">Minggu Ini</p>
                                <p class="text-2xl font-bold text-amber-600">0</p>
                            </div>
                            <div class="border-l-4 border-yellow-500 pl-4 py-2">
                                <p class="text-gray-600 text-sm">Rata-rata Level</p>
                                <p class="text-2xl font-bold text-yellow-600">0/10</p>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="bg-white rounded-xl shadow-lg p-6 tracker-card">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">🔗 Tautan Cepat</h3>
                        <div class="space-y-2">
                            <a href="{{ route('daily-commit-tracker.history') }}" class="flex items-center text-orange-600 hover:text-orange-700 font-semibold transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Lihat History
                            </a>
                            <a href="{{ route('dashboard') }}" class="flex items-center text-gray-600 hover:text-gray-700 font-semibold transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Kembali ke Dashboard
                            </a>
                        </div>
                    </div>

                    <!-- Tips Card -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl shadow-lg p-6 border border-blue-200">
                        <h3 class="text-lg font-bold text-blue-900 mb-4">💡 Tips</h3>
                        <ul class="space-y-2 text-sm text-blue-800">
                            <li class="flex items-start">
                                <span class="mr-2">✓</span>
                                <span>Catat poin penting dari apa yang kamu pelajari</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">✓</span>
                                <span>Berikan rating jujur untuk progress harimu</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">✓</span>
                                <span>Catat kesan dan pembelajaran berharga</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">✓</span>
                                <span>Bisa diedit sebelum hari berganti</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.dashboard>
