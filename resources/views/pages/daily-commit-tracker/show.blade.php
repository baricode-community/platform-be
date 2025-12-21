<x-layouts.dashboard :title="__('Daily Commit Tracker - ' . $trackedDate)">
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
    </style>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-orange-600 via-amber-500 to-yellow-500 py-12 px-6">
        <div class="container mx-auto">
            <div class="flex items-center justify-between">
                <div class="text-left">
                    <h1 class="text-4xl font-bold text-white mb-2 animate-fadeInUp">
                        📅 {{ \Carbon\Carbon::parse($trackedDate)->format('d F Y') }}
                    </h1>
                    <p class="text-lg text-orange-50 animate-fadeInUp" style="animation-delay: 0.1s;">
                        @if(\Carbon\Carbon::parse($trackedDate)->isToday())
                            Catatan untuk hari ini
                        @else
                            Lihat catatan untuk tanggal tersebut
                        @endif
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
            @if ($tracker)
                <!-- Existing Tracker -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Main Content -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="bg-gradient-to-r from-orange-500 to-amber-600 px-8 py-6 flex items-center justify-between">
                                <div>
                                    <h2 class="text-2xl font-bold text-white">{{ $tracker->title }}</h2>
                                    <p class="text-orange-50 mt-1">
                                        @if(\Carbon\Carbon::parse($trackedDate)->isToday())
                                            ✏️ Edit catatan harimu
                                        @else
                                            📖 Lihat catatan tanggal {{ \Carbon\Carbon::parse($trackedDate)->format('d M Y') }}
                                        @endif
                                    </p>
                                </div>
                                <div class="text-5xl font-bold text-white opacity-80">{{ $tracker->success_level }}/10</div>
                            </div>
                            
                            <div class="p-8">
                                @if(\Carbon\Carbon::parse($trackedDate)->isToday())
                                    @livewire('daily-commit-tracker-form', ['tracker' => $tracker, 'trackedDate' => $trackedDate])
                                @else
                                    <!-- Read-only View for Past Entries -->
                                    <div class="space-y-6">
                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Catatan</label>
                                            <div class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-700">
                                                {{ $tracker->title }}
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Catatan/Pesan</label>
                                            <div class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-700 whitespace-pre-wrap">
                                                {{ $tracker->message }}
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kesan Pribadi</label>
                                            <div class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-700 whitespace-pre-wrap">
                                                {{ $tracker->impression }}
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Level Keberhasilan</label>
                                            <div class="flex items-center gap-4">
                                                <div class="flex-1 h-2 bg-gradient-to-r from-red-500 via-yellow-500 to-green-500 rounded-lg"></div>
                                                <span class="text-2xl font-bold text-orange-600">{{ $tracker->success_level }}/10</span>
                                            </div>
                                        </div>

                                        <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                                            <p class="text-sm text-blue-900">
                                                <strong>ℹ️ Info:</strong> Catatan ini dari tanggal {{ \Carbon\Carbon::parse($trackedDate)->format('d F Y') }} dan hanya bisa dilihat dalam mode read-only. Untuk edit, gunakan catatan hari ini.
                                            </p>
                                        </div>

                                        <a href="{{ route('daily-commit-tracker.index') }}" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                            </svg>
                                            Kembali ke Tracker
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="space-y-6">
                        <!-- Info Card -->
                        <div class="bg-white rounded-xl shadow-lg p-6 tracker-card">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">📝 Informasi</h3>
                            <div class="space-y-3 text-sm">
                                <div class="border-l-4 border-orange-500 pl-4 py-2">
                                    <p class="text-gray-600">Dibuat</p>
                                    <p class="font-semibold text-gray-800">{{ $tracker->created_at->format('d M Y, H:i') }}</p>
                                </div>
                                <div class="border-l-4 border-amber-500 pl-4 py-2">
                                    <p class="text-gray-600">Diperbarui</p>
                                    <p class="font-semibold text-gray-800">{{ $tracker->updated_at->format('d M Y, H:i') }}</p>
                                </div>
                                <div class="border-l-4 border-yellow-500 pl-4 py-2">
                                    <p class="text-gray-600">ID</p>
                                    <p class="font-semibold text-gray-800 font-mono">{{ $tracker->id }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Success Level Info -->
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl shadow-lg p-6 border border-green-200">
                            <h3 class="text-lg font-bold text-green-900 mb-4">⭐ Level Keberhasilan</h3>
                            <div class="flex items-center gap-4">
                                <div class="text-4xl font-bold text-green-600">{{ $tracker->success_level }}</div>
                                <div>
                                    <p class="text-green-900 text-sm font-semibold">
                                        @if($tracker->success_level <= 3)
                                            Perlu Perbaikan
                                        @elseif($tracker->success_level <= 5)
                                            Cukup Baik
                                        @elseif($tracker->success_level <= 7)
                                            Baik
                                        @elseif($tracker->success_level <= 9)
                                            Sangat Baik
                                        @else
                                            Sempurna!
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- View History -->
                        <div class="bg-white rounded-xl shadow-lg p-6 tracker-card">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">🔗 Navigasi</h3>
                            <div class="space-y-2">
                                <a href="{{ route('daily-commit-tracker.history') }}" class="flex items-center text-orange-600 hover:text-orange-700 font-semibold transition-colors">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Lihat History
                                </a>
                                <a href="{{ route('daily-commit-tracker.index') }}" class="flex items-center text-gray-600 hover:text-gray-700 font-semibold transition-colors">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Buat Catatan Baru
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-xl shadow-lg p-12 text-center max-w-2xl mx-auto">
                    <svg class="w-24 h-24 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-3xl font-bold text-gray-800 mb-2">Belum Ada Catatan</h3>
                    <p class="text-gray-600 mb-8">Tidak ada catatan untuk tanggal <strong>{{ \Carbon\Carbon::parse($trackedDate)->format('d F Y') }}</strong>. 
                        @if(\Carbon\Carbon::parse($trackedDate)->isToday())
                            Mulai catat progress belajarmu hari ini!
                        @else
                            Kembali ke halaman utama untuk membuat catatan.
                        @endif
                    </p>
                    
                    @if(\Carbon\Carbon::parse($trackedDate)->isToday())
                        <div class="bg-gradient-to-r from-orange-100 to-amber-100 rounded-lg p-6 mb-6 border border-orange-300">
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                                <!-- Form Section -->
                                <div class="lg:col-span-2">
                                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                                        <div class="bg-gradient-to-r from-orange-500 to-amber-600 px-8 py-6">
                                            <h2 class="text-2xl font-bold text-white">📋 Catat Progress Harimu</h2>
                                        </div>
                                        
                                        <div class="p-8">
                                            @livewire('daily-commit-tracker-form')
                                        </div>
                                    </div>
                                </div>

                                <!-- Info Section -->
                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-sm text-gray-600 mb-3">💡 Jangan lupa catat:</p>
                                    <ul class="space-y-2 text-xs text-gray-700">
                                        <li class="flex items-start"><span class="mr-2">✓</span> Apa yang kamu pelajari</li>
                                        <li class="flex items-start"><span class="mr-2">✓</span> Fitur yang berhasil dibuat</li>
                                        <li class="flex items-start"><span class="mr-2">✓</span> Masalah yang dipecahkan</li>
                                        <li class="flex items-start"><span class="mr-2">✓</span> Rating honest 1-10</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('daily-commit-tracker.index') }}" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali ke Tracker
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </section>
</x-layouts.dashboard>
