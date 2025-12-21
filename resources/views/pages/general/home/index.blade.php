<x-layouts.base :title="__('Komunitas IT Keren di Indonesia')">
    <div class="min-h-screen bg-gradient-to-br from-gray-900 via-purple-900 to-indigo-900 text-white overflow-hidden">
        <!-- Hero Section -->
        <section class="relative min-h-screen flex items-center justify-center px-4 py-20">
            <!-- Floating Memes -->
            <div class="absolute top-20 left-10 animate-bounce delay-100">
                <div class="bg-purple-500/20 backdrop-blur-lg rounded-3xl p-4 text-4xl">😎</div>
            </div>
            <div class="absolute top-40 right-20 animate-bounce delay-300">
                <div class="bg-indigo-500/20 backdrop-blur-lg rounded-3xl p-4 text-4xl">🚀</div>
            </div>
            <div class="absolute bottom-40 left-20 animate-bounce delay-500">
                <div class="bg-violet-500/20 backdrop-blur-lg rounded-3xl p-4 text-4xl">💻</div>
            </div>

            <div class="max-w-7xl mx-auto text-center z-10">
                <h1
                    class="text-5xl md:text-7xl font-extrabold mb-8 bg-gradient-to-r from-purple-400 via-violet-400 to-indigo-400 bg-clip-text text-transparent drop-shadow-lg">
                    Komunitas IT Keren di Indonesia<br />
                    <span
                        class="block text-3xl md:text-5xl font-bold mt-2 bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent animate-gradient-x">
                        Bersama Bertumbuh, Belajar, dan Berbagi
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-200 mb-8 max-w-3xl mx-auto font-medium drop-shadow">
                    Bangun proyek bareng, ikut tantangan harian, dan berkembang bersama komunitas developer yang
                    positif.
                </p>
                <p class="text-lg text-gray-400 mb-10 max-w-2xl mx-auto italic">
                    Kami berbasis komunitas, jadi ada banyak fitur menarik yang tersedia khusus untuk kamu.<br>
                    <span class="font-semibold text-purple-300">Yuk, eksplorasi dan manfaatkan semua fiturnya!</span>
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center mb-20">
                    <a href="{{ route('dashboard') }}"
                        class="px-10 py-4 bg-gradient-to-r from-purple-600 via-violet-600 to-indigo-600 rounded-full font-bold text-lg shadow-lg hover:shadow-purple-500/40 transition-all transform hover:scale-105 flex items-center justify-center ring-2 ring-purple-400/30 hover:ring-4 hover:ring-indigo-400/40">
                        🚀 Gabung Gratis
                    </a>
                    <a href="#komunitas"
                        class="px-10 py-4 bg-white/10 backdrop-blur-lg rounded-full font-semibold text-lg border border-white/20 hover:bg-white/20 transition-all flex items-center justify-center ring-1 ring-white/10 hover:ring-2 hover:ring-purple-300/30">
                        👀 Lihat Aktivitas Komunitas
                    </a>
                </div>

                <!-- Dashboard Mockup -->
                <div class="relative max-w-5xl mx-auto group">
                    <div
                        class="absolute -top-8 -left-8 w-24 h-24 bg-gradient-to-br from-purple-400/30 to-indigo-400/10 rounded-full blur-2xl opacity-70 animate-pulse">
                    </div>
                    <div
                        class="absolute -bottom-8 -right-8 w-32 h-32 bg-gradient-to-br from-indigo-400/30 to-purple-400/10 rounded-full blur-2xl opacity-60 animate-pulse">
                    </div>
                    <div
                        class="bg-gradient-to-br from-purple-500/30 to-indigo-500/30 backdrop-blur-2xl rounded-3xl p-10 border border-purple-500/40 shadow-2xl shadow-purple-500/20 relative z-10 transition-all group-hover:scale-105 group-hover:shadow-indigo-500/30">
                        <div class="flex items-center gap-2 mb-6">
                            <div class="w-3 h-3 rounded-full bg-red-500 shadow"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500 shadow"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500 shadow"></div>
                        </div>
                        <div class="bg-gray-900/60 rounded-2xl p-8 text-left shadow-inner">
                            <div class="flex items-center gap-4 mb-6">
                                <div
                                    class="w-14 h-14 rounded-full bg-gradient-to-r from-purple-500 via-violet-500 to-indigo-500 flex items-center justify-center text-3xl shadow-lg border-4 border-white/10">
                                    🔥
                                </div>
                                <div>
                                    <div class="font-bold text-lg text-white">Daily Commit Streak</div>
                                    <div class="text-sm text-purple-300 font-semibold">14 hari berturut-turut <span
                                            class="animate-bounce inline-block">🔥</span></div>
                                </div>
                            </div>
                            <div class="grid grid-cols-7 gap-3">
                                <div
                                    class="h-10 bg-gradient-to-t from-purple-600 to-purple-400 rounded-lg shadow-md animate-pulse">
                                </div>
                                <div
                                    class="h-10 bg-gradient-to-t from-purple-600 to-purple-400 rounded-lg shadow-md animate-pulse delay-100">
                                </div>
                                <div
                                    class="h-10 bg-gradient-to-t from-purple-600 to-violet-500 rounded-lg shadow-md animate-pulse delay-200">
                                </div>
                                <div
                                    class="h-10 bg-gradient-to-t from-indigo-600 to-indigo-400 rounded-lg shadow-md animate-pulse delay-300">
                                </div>
                                <div
                                    class="h-10 bg-gradient-to-t from-indigo-600 to-violet-500 rounded-lg shadow-md animate-pulse delay-400">
                                </div>
                                <div
                                    class="h-10 bg-gradient-to-t from-violet-600 to-purple-500 rounded-lg shadow-md animate-pulse delay-500">
                                </div>
                                <div
                                    class="h-10 bg-gradient-to-t from-violet-600 to-purple-400 rounded-lg shadow-md animate-pulse delay-700">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Feature Highlight Section -->
        <section class="py-20 px-4 relative">
            <div class="max-w-3xl mx-auto text-center">
                <div class="mb-8">
                    <span
                        class="inline-block px-6 py-2 bg-gradient-to-r from-purple-500 to-indigo-500 text-white font-semibold rounded-full text-lg shadow">
                        {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                    </span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold mb-8">Jangan Biarkan Waktumu Tanpa Berkomunitas</h2>
                <p class="text-xl text-gray-200 mb-6 font-medium">
                    Karena ibarat lidi pada sapu, jika sendiri maka rapuh namun jika bersama maka sangat kuat.
                </p>
                <p class="text-lg text-purple-300 font-semibold mb-10">
                    Mari gabung ke komunitas terkece, keren, dan terbesar (secara bertahap) se-Indonesia!
                </p>
                <a href="{{ route('dashboard') }}"
                    class="px-10 py-4 bg-gradient-to-r from-purple-600 via-violet-600 to-indigo-600 rounded-full font-bold text-lg shadow-lg hover:shadow-purple-500/40 transition-all transform hover:scale-105 flex items-center justify-center ring-2 ring-purple-400/30 hover:ring-4 hover:ring-indigo-400/40">
                    🚀 Gabung Sekarang
                </a>
            </div>
        </section>

        <!-- Value Section -->
        <section class="py-20 px-4 relative">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">Kenapa Harus Baricode?</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div
                        class="bg-gradient-to-br from-purple-500/10 to-transparent backdrop-blur-lg rounded-3xl p-8 border border-purple-500/20 hover:border-purple-500/50 transition-all hover:shadow-xl hover:shadow-purple-500/20">
                        <div class="text-5xl mb-4">💯</div>
                        <h3 class="text-2xl font-bold mb-3">Gratis 100%</h3>
                        <p class="text-gray-300">Tidak ada biaya tersembunyi. Semua fitur gratis selamanya untuk semua
                            member.</p>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="bg-gradient-to-br from-indigo-500/10 to-transparent backdrop-blur-lg rounded-3xl p-8 border border-indigo-500/20 hover:border-indigo-500/50 transition-all hover:shadow-xl hover:shadow-indigo-500/20">
                        <div class="text-5xl mb-4">📊</div>
                        <h3 class="text-2xl font-bold mb-3">Daily Commit Tracker</h3>
                        <p class="text-gray-300">Pantau progress belajarmu setiap hari. Bangun kebiasaan coding yang
                            konsisten.</p>
                        <a href="{{ route('daily-commit-tracker.history') }}"
                            class="inline-block px-6 py-2 bg-indigo-600/80 text-white rounded-full font-semibold hover:bg-indigo-700 transition-all">
                            Lihat Tracker
                        </a>
                    </div>

                    <!-- Card 3 -->
                    <div
                        class="bg-gradient-to-br from-violet-500/10 to-transparent backdrop-blur-lg rounded-3xl p-8 border border-violet-500/20 hover:border-violet-500/50 transition-all hover:shadow-xl hover:shadow-violet-500/20">
                        <div class="text-5xl mb-4">🤝</div>
                        <h3 class="text-2xl font-bold mb-3">Proyek Kolaborasi</h3>
                        <p class="text-gray-300">Kerja bareng dalam tim, belajar Git workflow, dan bangun portfolio
                            bersama.</p>
                    </div>

                    <!-- Card 4 -->
                    <div
                        class="bg-gradient-to-br from-purple-500/10 to-transparent backdrop-blur-lg rounded-3xl p-8 border border-purple-500/20 hover:border-purple-500/50 transition-all hover:shadow-xl hover:shadow-purple-500/20">
                        <div class="text-5xl mb-4">😂</div>
                        <h3 class="text-2xl font-bold mb-3">Meme Zone</h3>
                        <p class="text-gray-300 mb-4">Belajar sambil ketawa. Share meme favoritmu dengan
                            komunitas.</p>
                        <a href="{{ route('memes.index') }}"
                            class="inline-block px-6 py-2 bg-purple-600/80 text-white rounded-full font-semibold hover:bg-purple-700 transition-all">
                            Lihat Meme
                        </a>
                    </div>

                    <!-- Card 5 -->
                    <div
                        class="bg-gradient-to-br from-indigo-500/10 to-transparent backdrop-blur-lg rounded-3xl p-8 border border-indigo-500/20 hover:border-indigo-500/50 transition-all hover:shadow-xl hover:shadow-indigo-500/20">
                        <div class="text-5xl mb-4">🗺️</div>
                        <h3 class="text-2xl font-bold mb-3">Roadmap Belajar</h3>
                        <p class="text-gray-300">Path yang jelas dari pemula sampai mahir. Tinggal ikuti langkah demi
                            langkah.</p>
                    </div>

                    <!-- Card 6 -->
                    <div
                        class="bg-gradient-to-br from-violet-500/10 to-transparent backdrop-blur-lg rounded-3xl p-8 border border-violet-500/20 hover:border-violet-500/50 transition-all hover:shadow-xl hover:shadow-violet-500/20">
                        <div class="text-5xl mb-4">💬</div>
                        <h3 class="text-2xl font-bold mb-3">Komunitas Aktif</h3>
                        <p class="text-gray-300">Tanya jawab kapan aja. Ada yang siap bantu kamu saat waktu luang.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Community Activity Feed -->
        <section class="py-20 px-4 relative">
            <div class="max-w-5xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">Aktivitas Komunitas Real-time</h2>

                <div class="flex justify-center mb-8">
                    <span
                        class="inline-block px-6 py-2 bg-yellow-400/20 text-yellow-300 font-semibold rounded-full text-lg border border-yellow-400/30 shadow">
                        Segera Hadir
                    </span>
                </div>

                <div
                    class="bg-gradient-to-br from-purple-500/10 to-indigo-500/10 backdrop-blur-xl rounded-3xl p-8 border border-purple-500/20">
                    <div class="space-y-4">
                        <!-- Activity 1 -->
                        <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-pink-500"></div>
                                <div class="flex-1">
                                    <p class="font-semibold">Budi menyelesaikan tantangan Day 14 🎉</p>
                                    <p class="text-sm text-gray-400">2 menit yang lalu</p>
                                </div>
                            </div>
                        </div>

                        <!-- Activity 2 -->
                        <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-indigo-500 to-blue-500"></div>
                                <div class="flex-1">
                                    <p class="font-semibold">Siti share meme: "Debugging be like..." 😂</p>
                                    <p class="text-sm text-gray-400">5 menit yang lalu</p>
                                </div>
                            </div>
                        </div>

                        <!-- Activity 3 -->
                        <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-violet-500 to-purple-500">
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold">Ahmad mencapai streak 30 hari! 🔥</p>
                                    <p class="text-sm text-gray-400">15 menit yang lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Project Showcase -->
        <section class="py-20 px-4 relative">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">Proyek dari Komunitas</h2>

                <div class="flex justify-center mb-8">
                    <span
                        class="inline-block px-6 py-2 bg-yellow-400/20 text-yellow-300 font-semibold rounded-full text-lg border border-yellow-400/30 shadow">
                        Segera Hadir
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Project 1 -->
                    <div
                        class="bg-gradient-to-br from-purple-500/10 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-purple-500/20 hover:border-purple-500/50 transition-all">
                        <div
                            class="bg-gradient-to-br from-purple-600 to-indigo-600 rounded-2xl h-40 mb-4 flex items-center justify-center text-6xl">
                            ✅
                        </div>
                        <h3 class="text-xl font-bold mb-2">Todo App</h3>
                        <p class="text-gray-400 text-sm mb-4">Aplikasi todo list dengan fitur drag & drop dan dark mode
                        </p>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 bg-purple-500/20 rounded-full text-xs">React</span>
                            <span class="px-3 py-1 bg-indigo-500/20 rounded-full text-xs">Tailwind</span>
                        </div>
                    </div>

                    <!-- Project 2 -->
                    <div
                        class="bg-gradient-to-br from-indigo-500/10 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-indigo-500/20 hover:border-indigo-500/50 transition-all">
                        <div
                            class="bg-gradient-to-br from-indigo-600 to-blue-600 rounded-2xl h-40 mb-4 flex items-center justify-center text-6xl">
                            🔗
                        </div>
                        <h3 class="text-xl font-bold mb-2">Shortlink App</h3>
                        <p class="text-gray-400 text-sm mb-4">URL shortener dengan analytics dan custom slug</p>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 bg-indigo-500/20 rounded-full text-xs">Node.js</span>
                            <span class="px-3 py-1 bg-blue-500/20 rounded-full text-xs">MongoDB</span>
                        </div>
                    </div>

                    <!-- Project 3 -->
                    <div
                        class="bg-gradient-to-br from-violet-500/10 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-violet-500/20 hover:border-violet-500/50 transition-all">
                        <div
                            class="bg-gradient-to-br from-violet-600 to-purple-600 rounded-2xl h-40 mb-4 flex items-center justify-center text-6xl">
                            💬
                        </div>
                        <h3 class="text-xl font-bold mb-2">Bot WhatsApp</h3>
                        <p class="text-gray-400 text-sm mb-4">Bot WA multifungsi untuk otomasi grup dan reminder</p>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 bg-violet-500/20 rounded-full text-xs">Python</span>
                            <span class="px-3 py-1 bg-purple-500/20 rounded-full text-xs">Selenium</span>
                        </div>
                    </div>

                    <!-- Project 4 -->
                    <div
                        class="bg-gradient-to-br from-purple-500/10 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-purple-500/20 hover:border-purple-500/50 transition-all">
                        <div
                            class="bg-gradient-to-br from-purple-600 to-pink-600 rounded-2xl h-40 mb-4 flex items-center justify-center text-6xl">
                            🎨
                        </div>
                        <h3 class="text-xl font-bold mb-2">Portfolio Generator</h3>
                        <p class="text-gray-400 text-sm mb-4">Generate portfolio website dari template siap pakai</p>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 bg-purple-500/20 rounded-full text-xs">Next.js</span>
                            <span class="px-3 py-1 bg-pink-500/20 rounded-full text-xs">TypeScript</span>
                        </div>
                    </div>

                    <!-- Project 5 -->
                    <div
                        class="bg-gradient-to-br from-indigo-500/10 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-indigo-500/20 hover:border-indigo-500/50 transition-all">
                        <div
                            class="bg-gradient-to-br from-indigo-600 to-cyan-600 rounded-2xl h-40 mb-4 flex items-center justify-center text-6xl">
                            📊
                        </div>
                        <h3 class="text-xl font-bold mb-2">Dashboard Analytics</h3>
                        <p class="text-gray-400 text-sm mb-4">Real-time analytics dashboard dengan chart interaktif</p>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 bg-indigo-500/20 rounded-full text-xs">Vue</span>
                            <span class="px-3 py-1 bg-cyan-500/20 rounded-full text-xs">Chart.js</span>
                        </div>
                    </div>

                    <!-- Project 6 -->
                    <div
                        class="bg-gradient-to-br from-violet-500/10 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-violet-500/20 hover:border-violet-500/50 transition-all">
                        <div
                            class="bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-2xl h-40 mb-4 flex items-center justify-center text-6xl">
                            🎮
                        </div>
                        <h3 class="text-xl font-bold mb-2">Mini Games Hub</h3>
                        <p class="text-gray-400 text-sm mb-4">Kumpulan mini games browser-based yang seru</p>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 bg-violet-500/20 rounded-full text-xs">JavaScript</span>
                            <span class="px-3 py-1 bg-fuchsia-500/20 rounded-full text-xs">Canvas</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-20 px-4 relative">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">Kata Mereka</h2>

                <div class="flex justify-center mb-8">
                    <span
                        class="inline-block px-6 py-2 bg-yellow-400/20 text-yellow-300 font-semibold rounded-full text-lg border border-yellow-400/30 shadow">
                        Segera Hadir
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="relative">
                        <div
                            class="bg-gradient-to-br from-purple-500/20 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-purple-500/30">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-14 h-14 rounded-full bg-gradient-to-r from-purple-500 to-pink-500"></div>
                                <div>
                                    <h4 class="font-bold">Rani Putri</h4>
                                    <p class="text-sm text-gray-400">Frontend Dev</p>
                                </div>
                            </div>
                            <p class="text-gray-300">"Baricode ngubah cara gue belajar coding. Dari yang males-malesan
                                jadi konsisten tiap hari. Daily commit tracker-nya bikin gue ketagihan!"</p>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="relative">
                        <div
                            class="bg-gradient-to-br from-indigo-500/20 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-indigo-500/30">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-14 h-14 rounded-full bg-gradient-to-r from-indigo-500 to-blue-500"></div>
                                <div>
                                    <h4 class="font-bold">Dimas Aji</h4>
                                    <p class="text-sm text-gray-400">Backend Dev</p>
                                </div>
                            </div>
                            <p class="text-gray-300">"Komunitas yang paling supportive! Gue dari nol banget, sekarang
                                udah bisa bikin full-stack app. Thanks Baricode!"</p>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="relative">
                        <div
                            class="bg-gradient-to-br from-violet-500/20 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-violet-500/30">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-14 h-14 rounded-full bg-gradient-to-r from-violet-500 to-purple-500">
                                </div>
                                <div>
                                    <h4 class="font-bold">Lina Safitri</h4>
                                    <p class="text-sm text-gray-400">Mobile Dev</p>
                                </div>
                            </div>
                            <p class="text-gray-300">"Hackathon mini-nya seru banget! Jadi ajang buat praktik skill
                                baru sambil dapet feedback dari senior."</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.base>
