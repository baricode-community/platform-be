<x-layouts.dashboard :title="__('Uji Kemampuanmu Sekarang')">
    <div class="max-w-7xl mx-auto px-4 py-12">
        
        <!-- Hero Section -->
        <div class="mb-12">
            <div class="bg-gradient-to-r from-purple-700/30 via-indigo-700/30 to-green-700/30 rounded-lg border border-purple-500/30 backdrop-blur-lg p-8 md:p-12">
                <div class="text-center">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Uji Kemampuanmu Sekarang!</h1>
                    <p class="text-lg text-purple-200 mb-8 max-w-2xl mx-auto">
                        Tantang dirimu dengan berbagai quiz interaktif untuk mengasah pengetahuanmu dan tingkatkan kemampuan programmu.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#featured-quizzes"
                            class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-8 rounded-lg transition shadow-lg hover:shadow-green-500/50">
                            Mulai Quiz Sekarang →
                        </a>
                        <a href="#all-quizzes"
                            class="inline-block bg-purple-600/40 hover:bg-purple-600/60 text-white font-semibold py-3 px-8 rounded-lg transition border border-purple-500/50">
                            Jelajahi Semua Quiz
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-12">
            <div class="bg-white/5 backdrop-blur-lg border border-purple-500/20 rounded-lg p-6 text-center">
                <div class="text-3xl font-bold text-green-400 mb-2">25+</div>
                <p class="text-purple-300 text-sm">Quiz Tersedia</p>
            </div>
            <div class="bg-white/5 backdrop-blur-lg border border-purple-500/20 rounded-lg p-6 text-center">
                <div class="text-3xl font-bold text-purple-400 mb-2">500+</div>
                <p class="text-purple-300 text-sm">Peserta Aktif</p>
            </div>
            <div class="bg-white/5 backdrop-blur-lg border border-purple-500/20 rounded-lg p-6 text-center">
                <div class="text-3xl font-bold text-indigo-400 mb-2">10+</div>
                <p class="text-purple-300 text-sm">Kategori</p>
            </div>
            <div class="bg-white/5 backdrop-blur-lg border border-purple-500/20 rounded-lg p-6 text-center">
                <div class="text-3xl font-bold text-emerald-400 mb-2">4.8★</div>
                <p class="text-purple-300 text-sm">Rating Kepuasan</p>
            </div>
        </div>

        <!-- Featured Quizzes Section -->
        <div id="featured-quizzes" class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-white mb-2">🔥 Quiz Unggulan</h2>
                    <p class="text-purple-300">Quiz paling populer minggu ini</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Quiz Card 1 -->
                <a href="#"
                    class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg overflow-hidden hover:shadow-xl hover:shadow-green-500/20 transition group cursor-pointer block">
                    <div class="h-32 bg-gradient-to-br from-green-500/30 to-emerald-500/30 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><circle cx=%2250%22 cy=%2250%22 r=%2240%22 fill=%22none%22 stroke=%22rgba(16,185,129,0.2)%22 stroke-width=%222%22/></svg>')] bg-repeat opacity-20"></div>
                        <svg class="w-16 h-16 text-green-400 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="font-bold text-white group-hover:text-green-400 transition text-lg">PHP Fundamental</h3>
                            <span class="px-2 py-1 bg-green-500/20 text-green-300 text-xs rounded font-semibold">Pemula</span>
                        </div>
                        <p class="text-purple-300 text-sm mb-4">Menguji pemahaman dasar tentang PHP, variabel, fungsi, dan control flow.</p>
                        <div class="flex items-center justify-between text-xs text-purple-400 mb-4">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.5 1.5H5.75A2.25 2.25 0 003.5 3.75v12.5A2.25 2.25 0 005.75 18.5h8.5a2.25 2.25 0 002.25-2.25V9.5m-12-4h10m-10 4v10m0-6h10"></path></svg>
                                15 Soal
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12zm.5-9H9V7a1 1 0 012 0v2z" clip-rule="evenodd"></path></svg>
                                30 menit
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                342 diikuti
                            </span>
                        </div>
                        <button class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded transition">
                            Mulai Quiz
                        </button>
                    </div>
                </a>

                <!-- Quiz Card 2 -->
                <a href="#"
                    class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg overflow-hidden hover:shadow-xl hover:shadow-green-500/20 transition group cursor-pointer block">
                    <div class="h-32 bg-gradient-to-br from-blue-500/30 to-cyan-500/30 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><circle cx=%2250%22 cy=%2250%22 r=%2240%22 fill=%22none%22 stroke=%22rgba(6,182,212,0.2)%22 stroke-width=%222%22/></svg>')] bg-repeat opacity-20"></div>
                        <svg class="w-16 h-16 text-cyan-400 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="font-bold text-white group-hover:text-green-400 transition text-lg">JavaScript Async/Await</h3>
                            <span class="px-2 py-1 bg-yellow-500/20 text-yellow-300 text-xs rounded font-semibold">Menengah</span>
                        </div>
                        <p class="text-purple-300 text-sm mb-4">Kuasai konsep asynchronous programming dengan Promise dan async/await.</p>
                        <div class="flex items-center justify-between text-xs text-purple-400 mb-4">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.5 1.5H5.75A2.25 2.25 0 003.5 3.75v12.5A2.25 2.25 0 005.75 18.5h8.5a2.25 2.25 0 002.25-2.25V9.5m-12-4h10m-10 4v10m0-6h10"></path></svg>
                                20 Soal
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12zm.5-9H9V7a1 1 0 012 0v2z" clip-rule="evenodd"></path></svg>
                                45 menit
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                287 diikuti
                            </span>
                        </div>
                        <button class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded transition">
                            Mulai Quiz
                        </button>
                    </div>
                </a>

                <!-- Quiz Card 3 -->
                <a href="#"
                    class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg overflow-hidden hover:shadow-xl hover:shadow-green-500/20 transition group cursor-pointer block">
                    <div class="h-32 bg-gradient-to-br from-pink-500/30 to-rose-500/30 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><circle cx=%2250%22 cy=%2250%22 r=%2240%22 fill=%22none%22 stroke=%22rgba(244,114,182,0.2)%22 stroke-width=%222%22/></svg>')] bg-repeat opacity-20"></div>
                        <svg class="w-16 h-16 text-pink-400 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="font-bold text-white group-hover:text-green-400 transition text-lg">React Hooks & State</h3>
                            <span class="px-2 py-1 bg-orange-500/20 text-orange-300 text-xs rounded font-semibold">Lanjutan</span>
                        </div>
                        <p class="text-purple-300 text-sm mb-4">Pahami React Hooks, useState, useEffect, dan custom hooks untuk aplikasi modern.</p>
                        <div class="flex items-center justify-between text-xs text-purple-400 mb-4">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.5 1.5H5.75A2.25 2.25 0 003.5 3.75v12.5A2.25 2.25 0 005.75 18.5h8.5a2.25 2.25 0 002.25-2.25V9.5m-12-4h10m-10 4v10m0-6h10"></path></svg>
                                25 Soal
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12zm.5-9H9V7a1 1 0 012 0v2z" clip-rule="evenodd"></path></svg>
                                60 menit
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                156 diikuti
                            </span>
                        </div>
                        <button class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded transition">
                            Mulai Quiz
                        </button>
                    </div>
                </a>
            </div>
        </div>

        <!-- Browse by Category Section -->
        <div class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-white mb-2">📚 Kategori Quiz</h2>
                    <p class="text-purple-300">Pilih kategori yang sesuai dengan minatmu</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Category Card -->
                <a href="#" class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg p-6 transition hover:shadow-lg hover:shadow-green-500/20 group cursor-pointer">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-lg bg-green-500/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path></svg>
                        </div>
                        <span class="text-purple-400 text-sm">8 Quiz</span>
                    </div>
                    <h3 class="text-lg font-semibold text-white group-hover:text-green-400 transition mb-1">PHP</h3>
                    <p class="text-purple-300 text-sm">Server-side programming yang powerful dan fleksibel</p>
                </a>

                <!-- Category Card -->
                <a href="#" class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg p-6 transition hover:shadow-lg hover:shadow-green-500/20 group cursor-pointer">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-lg bg-yellow-500/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path></svg>
                        </div>
                        <span class="text-purple-400 text-sm">10 Quiz</span>
                    </div>
                    <h3 class="text-lg font-semibold text-white group-hover:text-green-400 transition mb-1">JavaScript</h3>
                    <p class="text-purple-300 text-sm">Frontend dan backend development dengan bahasa modern</p>
                </a>

                <!-- Category Card -->
                <a href="#" class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg p-6 transition hover:shadow-lg hover:shadow-green-500/20 group cursor-pointer">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-lg bg-cyan-500/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-cyan-400" fill="currentColor" viewBox="0 0 20 20"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path></svg>
                        </div>
                        <span class="text-purple-400 text-sm">6 Quiz</span>
                    </div>
                    <h3 class="text-lg font-semibold text-white group-hover:text-green-400 transition mb-1">React</h3>
                    <p class="text-purple-300 text-sm">Library JavaScript untuk membangun UI interaktif</p>
                </a>

                <!-- Category Card -->
                <a href="#" class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg p-6 transition hover:shadow-lg hover:shadow-green-500/20 group cursor-pointer">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-lg bg-pink-500/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-pink-400" fill="currentColor" viewBox="0 0 20 20"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path></svg>
                        </div>
                        <span class="text-purple-400 text-sm">7 Quiz</span>
                    </div>
                    <h3 class="text-lg font-semibold text-white group-hover:text-green-400 transition mb-1">Database</h3>
                    <p class="text-purple-300 text-sm">SQL, NoSQL, dan optimasi database untuk aplikasi</p>
                </a>

                <!-- Category Card -->
                <a href="#" class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg p-6 transition hover:shadow-lg hover:shadow-green-500/20 group cursor-pointer">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-lg bg-purple-500/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-400" fill="currentColor" viewBox="0 0 20 20"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path></svg>
                        </div>
                        <span class="text-purple-400 text-sm">5 Quiz</span>
                    </div>
                    <h3 class="text-lg font-semibold text-white group-hover:text-green-400 transition mb-1">Git & DevOps</h3>
                    <p class="text-purple-300 text-sm">Version control dan deployment practices</p>
                </a>

                <!-- Category Card -->
                <a href="#" class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg p-6 transition hover:shadow-lg hover:shadow-green-500/20 group cursor-pointer">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-lg bg-indigo-500/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-indigo-400" fill="currentColor" viewBox="0 0 20 20"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path></svg>
                        </div>
                        <span class="text-purple-400 text-sm">4 Quiz</span>
                    </div>
                    <h3 class="text-lg font-semibold text-white group-hover:text-green-400 transition mb-1">API & REST</h3>
                    <p class="text-purple-300 text-sm">Building dan consuming RESTful APIs</p>
                </a>

                <!-- Category Card -->
                <a href="#" class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg p-6 transition hover:shadow-lg hover:shadow-green-500/20 group cursor-pointer">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-lg bg-emerald-500/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path></svg>
                        </div>
                        <span class="text-purple-400 text-sm">3 Quiz</span>
                    </div>
                    <h3 class="text-lg font-semibold text-white group-hover:text-green-400 transition mb-1">Security</h3>
                    <p class="text-purple-300 text-sm">Authentication, authorization, dan keamanan aplikasi</p>
                </a>

                <!-- Category Card -->
                <a href="#" class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg p-6 transition hover:shadow-lg hover:shadow-green-500/20 group cursor-pointer">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-lg bg-orange-500/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange-400" fill="currentColor" viewBox="0 0 20 20"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path></svg>
                        </div>
                        <span class="text-purple-400 text-sm">6 Quiz</span>
                    </div>
                    <h3 class="text-lg font-semibold text-white group-hover:text-green-400 transition mb-1">Testing</h3>
                    <p class="text-purple-300 text-sm">Unit testing, integration testing, dan TDD</p>
                </a>
            </div>
        </div>

        <!-- All Quizzes Section -->
        <div id="all-quizzes">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-white mb-2">📋 Semua Quiz</h2>
                    <p class="text-purple-300">Pilih quiz sesuai dengan kebutuhanmu</p>
                </div>
                <div class="flex gap-2">
                    <select class="bg-white/5 border border-purple-500/20 text-white rounded-lg px-4 py-2 text-sm hover:border-purple-500/40 fokus:outline-none focus:border-green-500/50 transition">
                        <option value="">Semua Tingkat</option>
                        <option value="">Pemula</option>
                        <option value="">Menengah</option>
                        <option value="">Lanjutan</option>
                    </select>
                    <input type="text" placeholder="Cari quiz..." class="bg-white/5 border border-purple-500/20 text-white rounded-lg px-4 py-2 text-sm placeholder-purple-400 hover:border-purple-500/40 focus:outline-none focus:border-green-500/50 transition w-48" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Quiz List Item -->
                <a href="#" class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg p-6 transition hover:shadow-lg hover:shadow-green-500/20 flex items-center justify-between group">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="text-lg font-semibold text-white group-hover:text-green-400 transition">HTML & CSS Fundamental</h3>
                            <span class="px-2 py-1 bg-green-500/20 text-green-300 text-xs rounded font-semibold">Pemula</span>
                        </div>
                        <p class="text-purple-300 text-sm mb-3">Dasar-dasar HTML dan CSS untuk membangun website yang responsif</p>
                        <div class="flex items-center gap-6 text-xs text-purple-400">
                            <span class="flex items-center gap-1">📝 12 Soal</span>
                            <span class="flex items-center gap-1">⏱️ 25 menit</span>
                            <span class="flex items-center gap-1">👥 298 peserta</span>
                        </div>
                    </div>
                    <div class="ml-4">
                        <svg class="w-6 h-6 text-purple-500 group-hover:text-green-400 transition" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </a>

                <!-- Quiz List Item -->
                <a href="#" class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg p-6 transition hover:shadow-lg hover:shadow-green-500/20 flex items-center justify-between group">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="text-lg font-semibold text-white group-hover:text-green-400 transition">Python Data Structure</h3>
                            <span class="px-2 py-1 bg-yellow-500/20 text-yellow-300 text-xs rounded font-semibold">Menengah</span>
                        </div>
                        <p class="text-purple-300 text-sm mb-3">Memahami list, tuple, dictionary, dan set dalam Python</p>
                        <div class="flex items-center gap-6 text-xs text-purple-400">
                            <span class="flex items-center gap-1">📝 18 Soal</span>
                            <span class="flex items-center gap-1">⏱️ 40 menit</span>
                            <span class="flex items-center gap-1">👥 156 peserta</span>
                        </div>
                    </div>
                    <div class="ml-4">
                        <svg class="w-6 h-6 text-purple-500 group-hover:text-green-400 transition" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </a>

                <!-- Quiz List Item -->
                <a href="#" class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg p-6 transition hover:shadow-lg hover:shadow-green-500/20 flex items-center justify-between group">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="text-lg font-semibold text-white group-hover:text-green-400 transition">Vue.js Essentials</h3>
                            <span class="px-2 py-1 bg-yellow-500/20 text-yellow-300 text-xs rounded font-semibold">Menengah</span>
                        </div>
                        <p class="text-purple-300 text-sm mb-3">Vue directives, components, state management, dan routing</p>
                        <div class="flex items-center gap-6 text-xs text-purple-400">
                            <span class="flex items-center gap-1">📝 16 Soal</span>
                            <span class="flex items-center gap-1">⏱️ 50 menit</span>
                            <span class="flex items-center gap-1">👥 203 peserta</span>
                        </div>
                    </div>
                    <div class="ml-4">
                        <svg class="w-6 h-6 text-purple-500 group-hover:text-green-400 transition" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </a>

                <!-- Quiz List Item -->
                <a href="#" class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg p-6 transition hover:shadow-lg hover:shadow-green-500/20 flex items-center justify-between group">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="text-lg font-semibold text-white group-hover:text-green-400 transition">Docker & Containerization</h3>
                            <span class="px-2 py-1 bg-orange-500/20 text-orange-300 text-xs rounded font-semibold">Lanjutan</span>
                        </div>
                        <p class="text-purple-300 text-sm mb-3">Docker containers, images, docker-compose, dan orchestration</p>
                        <div class="flex items-center gap-6 text-xs text-purple-400">
                            <span class="flex items-center gap-1">📝 14 Soal</span>
                            <span class="flex items-center gap-1">⏱️ 35 menit</span>
                            <span class="flex items-center gap-1">👥 89 peserta</span>
                        </div>
                    </div>
                    <div class="ml-4">
                        <svg class="w-6 h-6 text-purple-500 group-hover:text-green-400 transition" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </a>

                <!-- Quiz List Item -->
                <a href="#" class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg p-6 transition hover:shadow-lg hover:shadow-green-500/20 flex items-center justify-between group">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="text-lg font-semibold text-white group-hover:text-green-400 transition">SQL Advanced Queries</h3>
                            <span class="px-2 py-1 bg-orange-500/20 text-orange-300 text-xs rounded font-semibold">Lanjutan</span>
                        </div>
                        <p class="text-purple-300 text-sm mb-3">JOIN, subquery, aggregation, window functions, dan optimization</p>
                        <div class="flex items-center gap-6 text-xs text-purple-400">
                            <span class="flex items-center gap-1">📝 20 Soal</span>
                            <span class="flex items-center gap-1">⏱️ 55 menit</span>
                            <span class="flex items-center gap-1">👥 234 peserta</span>
                        </div>
                    </div>
                    <div class="ml-4">
                        <svg class="w-6 h-6 text-purple-500 group-hover:text-green-400 transition" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </a>

                <!-- Quiz List Item -->
                <a href="#" class="bg-white/5 backdrop-blur-lg border border-purple-500/20 hover:border-green-500/50 rounded-lg p-6 transition hover:shadow-lg hover:shadow-green-500/20 flex items-center justify-between group">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="text-lg font-semibold text-white group-hover:text-green-400 transition">OOP Principles</h3>
                            <span class="px-2 py-1 bg-yellow-500/20 text-yellow-300 text-xs rounded font-semibold">Menengah</span>
                        </div>
                        <p class="text-purple-300 text-sm mb-3">Encapsulation, inheritance, polymorphism, dan abstraction</p>
                        <div class="flex items-center gap-6 text-xs text-purple-400">
                            <span class="flex items-center gap-1">📝 17 Soal</span>
                            <span class="flex items-center gap-1">⏱️ 45 menit</span>
                            <span class="flex items-center gap-1">👥 412 peserta</span>
                        </div>
                    </div>
                    <div class="ml-4">
                        <svg class="w-6 h-6 text-purple-500 group-hover:text-green-400 transition" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </a>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="mt-16 bg-gradient-to-r from-green-700/30 via-emerald-700/30 to-teal-700/30 rounded-lg border border-green-500/30 backdrop-blur-lg p-12 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Siap Menguji Pengetahuanmu?</h2>
            <p class="text-lg text-purple-200 mb-8 max-w-2xl mx-auto">
                Bergabunglah dengan ribuan developer lain yang telah meningkatkan kemampuan mereka melalui quiz interaktif kami.
            </p>
            <a href="#featured-quizzes" class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-8 rounded-lg transition shadow-lg hover:shadow-green-500/50">
                Mulai Quiz Gratis Sekarang →
            </a>
        </div>

    </div>
</x-layouts.dashboard>
