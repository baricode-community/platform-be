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

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 py-16 px-6">
        <div class="container mx-auto">
            <div class="text-center">
                <h1 class="text-5xl font-bold text-white mb-4 animate-fadeInUp">
                    Halo, {{ Auth::user()->name ?? 'Member' }}! 👋
                </h1>
                <p class="text-xl text-gray-300 animate-fadeInUp" style="animation-delay: 0.1s;">
                    Selamat datang kembali di Baricode - komunitas IT terbaik dan paling seru!
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-6">
            <!-- Dashboard Utama Section -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-2 section-title">🎯 Akses Cepat</h2>
                <p class="text-gray-600 mb-8 mt-6">Mulai eksplorasi dan bagikan konten meme berkualitas dengan komunitas</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- My Memes -->
                    <a href="{{ route('home') }}" class="group grid-item">
                        <div class="dashboard-card bg-white rounded-xl overflow-hidden shadow-lg h-full">
                            <div class="bg-gradient-to-br from-pink-500 to-rose-600 h-28 flex items-center justify-center relative overflow-hidden">
                                <div class="absolute inset-0 bg-white opacity-10"></div>
                                <div class="icon-container">
                                    <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-rose-600 transition-colors">Meme Saya</h3>
                                <p class="text-gray-600 text-sm mb-6">Lihat, kelola, dan pantau performa meme yang telah Anda upload.</p>
                                <span class="inline-flex items-center text-rose-600 font-semibold text-sm group-hover:translate-x-1 transition-transform">
                                    Lihat Meme Saya
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>

                    <!-- Upload Meme -->
                    <a href="{{ route('home') }}" class="group grid-item">
                        <div class="dashboard-card bg-white rounded-xl overflow-hidden shadow-lg h-full">
                            <div class="bg-gradient-to-br from-blue-500 to-indigo-600 h-28 flex items-center justify-center relative overflow-hidden">
                                <div class="absolute inset-0 bg-white opacity-10"></div>
                                <div class="icon-container">
                                    <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-indigo-600 transition-colors">Upload Meme</h3>
                                <p class="text-gray-600 text-sm mb-6">Bagikan meme lucu Anda dan tunjukkan kreativitas kepada komunitas kami.</p>
                                <span class="inline-flex items-center text-indigo-600 font-semibold text-sm group-hover:translate-x-1 transition-transform">
                                    Upload Sekarang
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
                </div>
            </div>
            
            <!-- Quick Stats Section -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-2 section-title">📊 Statistik Profil Anda</h2>
                <p class="text-gray-600 mb-8 mt-6">Ringkasan performa dan aktivitas Anda di komunitas Baricode</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Total Memes Uploaded -->
                    <div class="group bg-gradient-to-br from-pink-50 to-pink-100 rounded-lg p-6 border-l-4 border-pink-500 transition-all hover:shadow-lg hover:scale-105">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm font-medium mb-1">📸 Meme Saya</p>
                                <p class="text-3xl font-bold text-pink-600">0</p>
                            </div>
                            <div class="bg-pink-200 p-4 rounded-full">
                                <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Total Likes -->
                    <div class="group bg-gradient-to-br from-red-50 to-red-100 rounded-lg p-6 border-l-4 border-red-500 transition-all hover:shadow-lg hover:scale-105">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm font-medium mb-1">❤️ Total Like</p>
                                <p class="text-3xl font-bold text-red-600">0</p>
                            </div>
                            <div class="bg-red-200 p-4 rounded-full">
                                <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Followers -->
                    <div class="group bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-6 border-l-4 border-blue-500 transition-all hover:shadow-lg hover:scale-105">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm font-medium mb-1">👥 Pengikut</p>
                                <p class="text-3xl font-bold text-blue-600">0</p>
                            </div>
                            <div class="bg-blue-200 p-4 rounded-full">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3a6 6 0 016-6h6a6 6 0 016 6h-12z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Badges/Achievements -->
                    <div class="group bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-lg p-6 border-l-4 border-yellow-500 transition-all hover:shadow-lg hover:scale-105">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm font-medium mb-1">🏆 Badge</p>
                                <p class="text-3xl font-bold text-yellow-600">0</p>
                            </div>
                            <div class="bg-yellow-200 p-4 rounded-full">
                                <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.dashboard>
