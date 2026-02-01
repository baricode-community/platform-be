<x-layouts.dashboard :title="__('Baricode Dashboard')">
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

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse-glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            }
            50% {
                box-shadow: 0 0 40px rgba(59, 130, 246, 0.6);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.6s ease-out forwards;
        }

        .dashboard-card {
            animation: fadeInUp 0.6s ease-out;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .dashboard-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .dashboard-card .icon-container {
            animation: float 3s ease-in-out infinite;
        }

        .dashboard-card:hover .icon-container {
            animation: pulse-glow 2s ease-in-out infinite;
        }

        .section-title {
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, #3b82f6, #8b5cf6);
            border-radius: 2px;
        }

        .hero-text {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 50%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: fadeInUp 0.8s ease-out;
        }

        .grid-item {
            animation: fadeInUp 0.6s ease-out;
        }

        .grid-item:nth-child(1) { animation-delay: 0.1s; }
        .grid-item:nth-child(2) { animation-delay: 0.2s; }
        .grid-item:nth-child(3) { animation-delay: 0.3s; }
        .grid-item:nth-child(4) { animation-delay: 0.4s; }
        .grid-item:nth-child(5) { animation-delay: 0.5s; }
        .grid-item:nth-child(6) { animation-delay: 0.6s; }
    </style>
    
    <!-- Main Content -->
    <section class="py-12 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-6">
            <!-- Dashboard Utama Section -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-2 section-title">🎯 Akses Cepat</h2>
                <p class="text-gray-600 mb-8 mt-6">Mulai eksplorasi dengan berkualitas dengan komunitas</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Pengaturan --}}
                    <a href="{{ route('dashboard.settings') }}" class="group grid-item">
                        <div class="dashboard-card bg-white rounded-xl overflow-hidden shadow-lg h-full">
                            <div class="bg-gradient-to-br from-green-500 to-teal-600 h-28 flex items-center justify-center relative overflow-hidden">
                                <div class="absolute inset-0 bg-white opacity-10"></div>
                                <div class="icon-container">
                                    <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-10V4m0 16v-4m8-8h4m-16 0H4m12.364 12.364l2.828 2.828m-12.728-12.728l2.828 2.828m0 8.486l-2.828 2.828m12.728-12.728l-2.828 2.828"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-teal-600 transition-colors">Pengaturan</h3>
                                <p class="text-gray-600 text-sm mb-6">Sesuaikan preferensi akun, keamanan, dan pengaturan notifikasi Anda.</p>
                                <span class="inline-flex items-center text-teal-600 font-semibold text-sm group-hover:translate-x-1 transition-transform">
                                    Buka Pengaturan
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>

                    <!-- Profile -->
                    <a href="{{ route('profile', auth()->user()->username) }}" class="group grid-item">
                        <div class="dashboard-card bg-white rounded-xl overflow-hidden shadow-lg h-full">
                            <div class="bg-gradient-to-br from-purple-500 to-pink-600 h-28 flex items-center justify-center relative overflow-hidden">
                                <div class="absolute inset-0 bg-white opacity-10"></div>
                                <div class="icon-container">
                                    <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-pink-600 transition-colors">Profil Saya</h3>
                                <p class="text-gray-600 text-sm mb-6">Kelola informasi profil, preferensi, dan pengaturan akun Anda.</p>
                                <span class="inline-flex items-center text-pink-600 font-semibold text-sm group-hover:translate-x-1 transition-transform">
                                    Edit Profil
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>

                    <!-- Daily Commit Tracker -->
                    <a href="{{ route('daily-commit-tracker.index') }}" class="group grid-item">
                        <div class="dashboard-card bg-white rounded-xl overflow-hidden shadow-lg h-full">
                            <div class="bg-gradient-to-br from-orange-500 to-amber-600 h-28 flex items-center justify-center relative overflow-hidden">
                                <div class="absolute inset-0 bg-white opacity-10"></div>
                                <div class="icon-container">
                                    <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-amber-600 transition-colors">Daily Commit Tracker</h3>
                                <p class="text-gray-600 text-sm mb-6">Pantau progress belajarmu setiap hari. Bangun kebiasaan coding yang konsisten.</p>
                                <span class="inline-flex items-center text-amber-600 font-semibold text-sm group-hover:translate-x-1 transition-transform">
                                    Buka Tracker
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.dashboard>
