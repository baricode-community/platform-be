<x-layouts.system :title="__('Dashboard Pengelola')">
    <div class="space-y-6">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-white mb-2">{{ __('Dashboard Pengelola') }}</h1>
            <p class="text-gray-400">{{ __('Ringkasan dan kontrol penuh atas sistem') }}</p>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Total Users Card -->
            <div class="bg-gradient-to-br from-blue-600/20 to-blue-700/20 border border-blue-500/30 rounded-xl p-6 hover:border-blue-500/50 transition-colors">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-300 text-sm font-medium mb-1">{{ __('Total Pengguna') }}</p>
                        <h3 class="text-3xl font-bold text-white">{{ $stats['total_users'] }}</h3>
                        <p class="text-blue-400 text-xs mt-2">{{ $stats['active_users'] }} {{ __('pengguna terverifikasi') }}</p>
                    </div>
                    <svg class="w-12 h-12 text-blue-500/30" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                    </svg>
                </div>
            </div>

            <!-- Total Meets Card -->
            <div class="bg-gradient-to-br from-purple-600/20 to-purple-700/20 border border-purple-500/30 rounded-xl p-6 hover:border-purple-500/50 transition-colors">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-300 text-sm font-medium mb-1">{{ __('Total Pertemuan') }}</p>
                        <h3 class="text-3xl font-bold text-white">{{ $stats['total_meets'] }}</h3>
                        <p class="text-purple-400 text-xs mt-2">{{ $stats['active_meets'] }} {{ __('aktif') }}</p>
                    </div>
                    <svg class="w-12 h-12 text-purple-500/30" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H4zm12 0a1 1 0 100-2 2 2 0 00-2 2h2zm-8 4a1 1 0 000 2H8a1 1 0 000-2H8zm0 4a1 1 0 000 2h2a1 1 0 100-2h-2zm4-4a1 1 0 000 2h2a1 1 0 100-2h-2z"/>
                    </svg>
                </div>
            </div>

            <!-- Total Memes Card -->
            <div class="bg-gradient-to-br from-pink-600/20 to-pink-700/20 border border-pink-500/30 rounded-xl p-6 hover:border-pink-500/50 transition-colors">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-pink-300 text-sm font-medium mb-1">{{ __('Total Meme') }}</p>
                        <h3 class="text-3xl font-bold text-white">{{ $stats['total_memes'] }}</h3>
                        <p class="text-pink-400 text-xs mt-2">{{ $stats['total_votes'] }} {{ __('suara') }}</p>
                    </div>
                    <svg class="w-12 h-12 text-pink-500/30" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M15.3 1.6H4.7A3.7 3.7 0 001 5.3v9.4a3.7 3.7 0 003.7 3.7h10.6a3.7 3.7 0 003.7-3.7V5.3a3.7 3.7 0 00-3.7-3.7zm0 1.8a1.9 1.9 0 011.9 1.9v7.5a1.9 1.9 0 01-1.9 1.9H4.7a1.9 1.9 0 01-1.9-1.9V5.3a1.9 1.9 0 011.9-1.9h10.6z"/>
                    </svg>
                </div>
            </div>

            <!-- Participations Card -->
            <div class="bg-gradient-to-br from-green-600/20 to-green-700/20 border border-green-500/30 rounded-xl p-6 hover:border-green-500/50 transition-colors">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-300 text-sm font-medium mb-1">{{ __('Partisipasi') }}</p>
                        <h3 class="text-3xl font-bold text-white">{{ $stats['user_participations'] }}</h3>
                        <p class="text-green-400 text-xs mt-2">{{ __('pengguna bergabung') }}</p>
                    </div>
                    <svg class="w-12 h-12 text-green-500/30" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v4h8v-4zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Users Growth Chart -->
            <div class="bg-gray-900/50 border border-gray-800/50 rounded-xl p-6">
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-white mb-1">{{ __('Pertumbuhan Pengguna') }}</h2>
                    <p class="text-gray-400 text-sm">{{ __('30 hari terakhir') }}</p>
                </div>
                <div id="users-chart" class="h-64"></div>
            </div>

            <!-- Memes Growth Chart -->
            <div class="bg-gray-900/50 border border-gray-800/50 rounded-xl p-6">
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-white mb-1">{{ __('Pertumbuhan Meme') }}</h2>
                    <p class="text-gray-400 text-sm">{{ __('30 hari terakhir') }}</p>
                </div>
                <div id="memes-chart" class="h-64"></div>
            </div>
        </div>

        <!-- Recent Data Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Users -->
            <div class="bg-gray-900/50 border border-gray-800/50 rounded-xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-white">{{ __('Pengguna Terbaru') }}</h2>
                    <a href="#" class="text-blue-400 hover:text-blue-300 text-sm font-medium">{{ __('Lihat Semua') }}</a>
                </div>
                <div class="space-y-3">
                    @forelse($recent_users as $user)
                        <div class="flex items-center justify-between p-3 bg-gray-800/30 rounded-lg hover:bg-gray-800/50 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center">
                                    <span class="text-white font-bold">{{ substr($user->name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="text-white font-medium text-sm">{{ $user->name }}</p>
                                </div>
                            </div>
                            <span class="text-xs text-gray-500">{{ $user->created_at->diffForHumans() }}</span>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-4">{{ __('Tidak ada pengguna') }}</p>
                    @endforelse
                </div>
            </div>

            <!-- Recent Memes -->
            <div class="bg-gray-900/50 border border-gray-800/50 rounded-xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-white">{{ __('Meme Terbaru') }}</h2>
                    <a href="#" class="text-pink-400 hover:text-pink-300 text-sm font-medium">{{ __('Lihat Semua') }}</a>
                </div>
                <div class="space-y-3">
                    @forelse($recent_memes as $meme)
                        <div class="flex items-center justify-between p-3 bg-gray-800/30 rounded-lg hover:bg-gray-800/50 transition-colors">
                            <div class="flex items-center gap-3 flex-1 min-w-0">
                                <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-pink-500 to-red-500 flex-shrink-0"></div>
                                <div class="min-w-0">
                                    <p class="text-white font-medium text-sm truncate">{{ $meme->title ?? 'Meme' }}</p>
                                    <p class="text-gray-400 text-xs">{{ $meme->user->name ?? 'Unknown' }}</p>
                                </div>
                            </div>
                            <span class="text-xs text-gray-500 flex-shrink-0 ml-2">{{ $meme->created_at->diffForHumans() }}</span>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-4">{{ __('Tidak ada meme') }}</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Recent Meets -->
        <div class="bg-gray-900/50 border border-gray-800/50 rounded-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-white">{{ __('Pertemuan Terbaru') }}</h2>
                <a href="#" class="text-purple-400 hover:text-purple-300 text-sm font-medium">{{ __('Lihat Semua') }}</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-800/50">
                            <th class="text-left py-3 px-4 text-gray-400 font-medium text-sm">{{ __('Judul') }}</th>
                            <th class="text-left py-3 px-4 text-gray-400 font-medium text-sm">{{ __('Peserta') }}</th>
                            <th class="text-left py-3 px-4 text-gray-400 font-medium text-sm">{{ __('Status') }}</th>
                            <th class="text-left py-3 px-4 text-gray-400 font-medium text-sm">{{ __('Tanggal') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800/50">
                        @forelse($recent_meets as $meet)
                            <tr class="hover:bg-gray-800/20 transition-colors">
                                <td class="py-3 px-4 text-white text-sm font-medium">{{ $meet->title ?? 'Pertemuan' }}</td>
                                <td class="py-3 px-4 text-gray-400 text-sm">{{ $meet->participants_count ?? 0 }} {{ __('anggota') }}</td>
                                <td class="py-3 px-4">
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-medium
                                        @if($meet->status === 'active') bg-green-500/20 text-green-400
                                        @elseif($meet->status === 'pending') bg-yellow-500/20 text-yellow-400
                                        @else bg-gray-500/20 text-gray-400 @endif">
                                        {{ ucfirst($meet->status ?? 'pending') }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-gray-400 text-sm">{{ $meet->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 px-4 text-center text-gray-500">{{ __('Tidak ada pertemuan') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
    <script>
        // Users Chart
        const usersData = @json($chart_data['users_per_day']);
        const usersCtx = document.getElementById('users-chart').getContext('2d');
        new Chart(usersCtx, {
            type: 'line',
            data: {
                labels: usersData.map(d => new Date(d.date).toLocaleDateString('id-ID', {month: 'short', day: 'numeric'})),
                datasets: [{
                    label: '{{ __("Pengguna Baru") }}',
                    data: usersData.map(d => d.count),
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: '#3b82f6',
                    pointBorderColor: '#1e3a8a',
                    pointBorderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: { color: '#d1d5db', font: { size: 12 } }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#9ca3af' },
                        grid: { color: 'rgba(255, 255, 255, 0.05)' }
                    },
                    x: {
                        ticks: { color: '#9ca3af' },
                        grid: { color: 'rgba(255, 255, 255, 0.05)' }
                    }
                }
            }
        });

        // Memes Chart
        const memesData = @json($chart_data['memes_per_day']);
        const memesCtx = document.getElementById('memes-chart').getContext('2d');
        new Chart(memesCtx, {
            type: 'line',
            data: {
                labels: memesData.map(d => new Date(d.date).toLocaleDateString('id-ID', {month: 'short', day: 'numeric'})),
                datasets: [{
                    label: '{{ __("Meme Baru") }}',
                    data: memesData.map(d => d.count),
                    borderColor: '#ec4899',
                    backgroundColor: 'rgba(236, 72, 153, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: '#ec4899',
                    pointBorderColor: '#831843',
                    pointBorderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: { color: '#d1d5db', font: { size: 12 } }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#9ca3af' },
                        grid: { color: 'rgba(255, 255, 255, 0.05)' }
                    },
                    x: {
                        ticks: { color: '#9ca3af' },
                        grid: { color: 'rgba(255, 255, 255, 0.05)' }
                    }
                }
            }
        });
    </script>
    @endpush
</x-layouts.system>