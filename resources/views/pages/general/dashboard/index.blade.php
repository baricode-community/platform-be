<x-layouts.dashboard :title="__('Baricode Dashboard')">
    <!-- Dashboard Navigation Cards -->
    <section class="py-6 bg-gray-50">
        <div class="container mx-auto px-6">
            <!-- General Dashboard -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Dashboard Utama</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Analytics Dashboard Card -->
                    <a href="{{ route('dashboard.analytics') }}" class="group">
                        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden">
                            <div class="bg-gradient-to-br from-blue-500 to-blue-600 h-24 flex items-center justify-center">
                                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2 group-hover:text-blue-600 transition-colors">Dashboard Analytics</h3>
                                <p class="text-gray-600 text-sm mb-4">Lihat statistik dan analytics keseluruhan platform Anda.</p>
                                <span class="inline-flex items-center text-blue-600 font-semibold text-sm">
                                    Kunjungi
                                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Fun Section -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Hiburan</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Memes Dashboard Card -->
                    <a href="{{ route('memes') }}" class="group">
                        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden">
                            <div class="bg-gradient-to-br from-pink-500 to-rose-600 h-24 flex items-center justify-center">
                                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2 group-hover:text-rose-600 transition-colors">Gallery Meme</h3>
                                <p class="text-gray-600 text-sm mb-4">Koleksi meme lucu dari komunitas kami.</p>
                                <span class="inline-flex items-center text-rose-600 font-semibold text-sm">
                                    Kunjungi
                                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Ringkasan Cepat</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium mb-1">Total Pertemuan</p>
                                <p class="text-2xl font-bold text-gray-800">0</p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium mb-1">Status Akun</p>
                                <p class="text-2xl font-bold text-green-600">Aktif</p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium mb-1">Terakhir Login</p>
                                <p class="text-lg font-bold text-gray-800">Hari ini</p>
                            </div>
                            <div class="bg-purple-100 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.dashboard>
