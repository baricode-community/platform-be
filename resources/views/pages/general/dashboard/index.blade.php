<x-layouts.dashboard :title="__('Baricode Dashboard')">
    <style>
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        .animate-slideIn {
            animation: slideIn 0.6s ease-out forwards;
        }

        .animate-slideInHero {
            animation: slideIn 0.7s ease-out;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-item:nth-child(1) {
            animation-delay: 0.1s;
        }

        .card-item:nth-child(2) {
            animation-delay: 0.2s;
        }

        .card-item:nth-child(3) {
            animation-delay: 0.3s;
        }
    </style>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 py-4 md:px-8">


        <div class="mb-10 pb-6 border-b border-slate-200 dark:border-slate-700">
            <p class="text-slate-500 dark:text-slate-400 text-center text-sm md:text-base">
            ✨ Ini adalah awal dari perjalanan pembelajaran Anda di Baricode. Platform kami terus berkembang dengan
            fitur-fitur baru yang menarik.
            </p>
        </div>

        <!-- Main Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
            <!-- LMS Card -->
            <a href="{{ route('lms.index') }}" class="group card-item animate-slideIn">
                <div
                    class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-8 h-full hover:shadow-lg dark:hover:shadow-lg hover:shadow-slate-200 dark:hover:shadow-slate-900/50 transition-all duration-300 hover:-translate-y-1">
                    <div class="mb-6">
                        <div
                            class="animate-float inline-flex items-center justify-center w-16 h-16 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-500 text-white shadow-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17s4.5 10.747 10 10.747c5.5 0 10-4.998 10-10.747 0-6.002-4.5-10.747-10-10.747z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-slate-900 dark:text-white text-2xl font-bold mb-3">Pelajari Kursus</h2>
                    <p class="text-slate-600 dark:text-slate-300 text-base leading-relaxed mb-6">
                        Jelajahi berbagai kursus pembelajaran interaktif dan kembangkan skill baru dengan materi
                        berkualitas tinggi.
                    </p>
                    <div class="inline-flex items-center group-hover:translate-x-1 transition-transform duration-300">
                        <span class="text-blue-600 dark:text-blue-400 font-semibold text-sm">Buka LMS</span>
                        <svg class="w-4 h-4 ml-2 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>
                </div>
            </a>

            <!-- Settings Card -->
            <a href="{{ route('dashboard.settings') }}" class="group card-item animate-slideIn">
                <div
                    class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-8 h-full hover:shadow-lg dark:hover:shadow-lg hover:shadow-slate-200 dark:hover:shadow-slate-900/50 transition-all duration-300 hover:-translate-y-1">
                    <div class="mb-6">
                        <div
                            class="animate-float inline-flex items-center justify-center w-16 h-16 rounded-xl bg-gradient-to-br from-amber-500 to-orange-500 text-white shadow-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-slate-900 dark:text-white text-2xl font-bold mb-3">Pengaturan</h2>
                    <p class="text-slate-600 dark:text-slate-300 text-base leading-relaxed mb-6">
                        Sesuaikan preferensi akun, atur keamanan, dan kelola notifikasi sesuai kebutuhan dan gaya
                        kerjamu.
                    </p>
                    <div class="inline-flex items-center group-hover:translate-x-1 transition-transform duration-300">
                        <span class="text-amber-600 dark:text-amber-400 font-semibold text-sm">Buka Pengaturan</span>
                        <svg class="w-4 h-4 ml-2 text-amber-600 dark:text-amber-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>
</x-layouts.dashboard>
