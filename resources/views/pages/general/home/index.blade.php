<x-layouts.base :title="__('Komunitas IT Paling Keren di Indonesia')">
    <div class="min-h-screen bg-gradient-to-br from-gray-900 via-purple-900 to-indigo-900 text-white overflow-hidden">
        
        <!-- Background Code Snippets -->
        <div class="fixed inset-0 opacity-5 pointer-events-none">
            <pre class="text-purple-300 text-sm">
function learn() {
    const skills = ['HTML', 'CSS', 'JS'];
    return skills.map(skill => master(skill));
}
            </pre>
        </div>

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
                <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-purple-400 via-violet-400 to-indigo-400 bg-clip-text text-transparent">
                    Belajar Ngoding Gratis 100%<br/>Bersama Komunitas Aktif di Indonesia
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-10 max-w-3xl mx-auto">
                    Bangun proyek bareng, ikut tantangan harian, dan berkembang bersama komunitas developer yang positif.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                    <a href="{{ route('dashboard') }}" class="px-8 py-4 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-3xl font-semibold text-lg hover:shadow-2xl hover:shadow-purple-500/50 transition-all transform hover:scale-105 flex items-center justify-center">
                        Gabung Gratis
                    </a>
                    <button class="px-8 py-4 bg-white/10 backdrop-blur-lg rounded-3xl font-semibold text-lg border border-white/20 hover:bg-white/20 transition-all">
                        Lihat Aktivitas Komunitas
                    </button>
                </div>

                <!-- Dashboard Mockup -->
                <div class="relative max-w-5xl mx-auto">
                    <div class="bg-gradient-to-br from-purple-500/20 to-indigo-500/20 backdrop-blur-xl rounded-3xl p-8 border border-purple-500/30 shadow-2xl shadow-purple-500/20">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        </div>
                        <div class="bg-gray-900/50 rounded-2xl p-6 text-left">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-indigo-500"></div>
                                <div>
                                    <div class="font-semibold">Daily Commit Streak</div>
                                    <div class="text-sm text-gray-400">14 hari berturut-turut 🔥</div>
                                </div>
                            </div>
                            <div class="grid grid-cols-7 gap-2">
                                <div class="h-8 bg-purple-600 rounded"></div>
                                <div class="h-8 bg-purple-600 rounded"></div>
                                <div class="h-8 bg-purple-600 rounded"></div>
                                <div class="h-8 bg-indigo-600 rounded"></div>
                                <div class="h-8 bg-indigo-600 rounded"></div>
                                <div class="h-8 bg-violet-600 rounded"></div>
                                <div class="h-8 bg-violet-600 rounded"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Value Section -->
        <section class="py-20 px-4 relative">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">Kenapa Harus Baricode?</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="bg-gradient-to-br from-purple-500/10 to-transparent backdrop-blur-lg rounded-3xl p-8 border border-purple-500/20 hover:border-purple-500/50 transition-all hover:shadow-xl hover:shadow-purple-500/20">
                        <div class="text-5xl mb-4">💯</div>
                        <h3 class="text-2xl font-bold mb-3">Gratis 100%</h3>
                        <p class="text-gray-300">Tidak ada biaya tersembunyi. Semua fitur gratis selamanya untuk semua member.</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-gradient-to-br from-indigo-500/10 to-transparent backdrop-blur-lg rounded-3xl p-8 border border-indigo-500/20 hover:border-indigo-500/50 transition-all hover:shadow-xl hover:shadow-indigo-500/20">
                        <div class="text-5xl mb-4">📊</div>
                        <h3 class="text-2xl font-bold mb-3">Daily Commit Tracker</h3>
                        <p class="text-gray-300">Pantau progress belajarmu setiap hari. Bangun kebiasaan coding yang konsisten.</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-gradient-to-br from-violet-500/10 to-transparent backdrop-blur-lg rounded-3xl p-8 border border-violet-500/20 hover:border-violet-500/50 transition-all hover:shadow-xl hover:shadow-violet-500/20">
                        <div class="text-5xl mb-4">🤝</div>
                        <h3 class="text-2xl font-bold mb-3">Proyek Kolaborasi</h3>
                        <p class="text-gray-300">Kerja bareng dalam tim, belajar Git workflow, dan bangun portfolio bersama.</p>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-gradient-to-br from-purple-500/10 to-transparent backdrop-blur-lg rounded-3xl p-8 border border-purple-500/20 hover:border-purple-500/50 transition-all hover:shadow-xl hover:shadow-purple-500/20">
                        <div class="text-5xl mb-4">😂</div>
                        <h3 class="text-2xl font-bold mb-3">Meme Zone</h3>
                        <p class="text-gray-300">Belajar sambil ketawa. Share meme coding favoritmu dengan komunitas.</p>
                    </div>

                    <!-- Card 5 -->
                    <div class="bg-gradient-to-br from-indigo-500/10 to-transparent backdrop-blur-lg rounded-3xl p-8 border border-indigo-500/20 hover:border-indigo-500/50 transition-all hover:shadow-xl hover:shadow-indigo-500/20">
                        <div class="text-5xl mb-4">🗺️</div>
                        <h3 class="text-2xl font-bold mb-3">Roadmap Belajar</h3>
                        <p class="text-gray-300">Path yang jelas dari pemula sampai mahir. Tinggal ikuti langkah demi langkah.</p>
                    </div>

                    <!-- Card 6 -->
                    <div class="bg-gradient-to-br from-violet-500/10 to-transparent backdrop-blur-lg rounded-3xl p-8 border border-violet-500/20 hover:border-violet-500/50 transition-all hover:shadow-xl hover:shadow-violet-500/20">
                        <div class="text-5xl mb-4">💬</div>
                        <h3 class="text-2xl font-bold mb-3">Komunitas Aktif</h3>
                        <p class="text-gray-300">Tanya jawab kapan aja. Ada yang siap bantu kamu saat waktu luang.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Feature Highlight Section -->
        <section class="py-20 px-4 relative">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">Fitur Unggulan</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-white/5 backdrop-blur-xl rounded-3xl p-8 border border-white/10">
                        <div class="flex items-start gap-6">
                            <div class="text-6xl">🔥</div>
                            <div>
                                <h3 class="text-2xl font-bold mb-3">Daily Commit</h3>
                                <p class="text-gray-300">Tantangan harian yang bikin kamu tetap produktif. Streak counter buat motivasi ekstra.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-white/5 backdrop-blur-xl rounded-3xl p-8 border border-white/10">
                        <div class="flex items-start gap-6">
                            <div class="text-6xl">📝</div>
                            <div>
                                <h3 class="text-2xl font-bold mb-3">Code Journal</h3>
                                <p class="text-gray-300">Catat progress, bug yang udah dipecahin, dan hal baru yang dipelajari setiap hari.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-white/5 backdrop-blur-xl rounded-3xl p-8 border border-white/10">
                        <div class="flex items-start gap-6">
                            <div class="text-6xl">🎯</div>
                            <div>
                                <h3 class="text-2xl font-bold mb-3">Learning Path</h3>
                                <p class="text-gray-300">Kurikulum terstruktur dari dasar sampai advanced. Frontend, Backend, atau Mobile.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Community Activity Feed -->
        <section class="py-20 px-4 relative">
            <div class="max-w-5xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">Aktivitas Komunitas Real-time</h2>

                <div class="flex justify-center mb-8">
                    <span class="inline-block px-6 py-2 bg-yellow-400/20 text-yellow-300 font-semibold rounded-full text-lg border border-yellow-400/30 shadow">
                        Segera Hadir
                    </span>
                </div>
                
                <div class="bg-gradient-to-br from-purple-500/10 to-indigo-500/10 backdrop-blur-xl rounded-3xl p-8 border border-purple-500/20">
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
                                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-violet-500 to-purple-500"></div>
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
                    <span class="inline-block px-6 py-2 bg-yellow-400/20 text-yellow-300 font-semibold rounded-full text-lg border border-yellow-400/30 shadow">
                        Segera Hadir
                    </span>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Project 1 -->
                    <div class="bg-gradient-to-br from-purple-500/10 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-purple-500/20 hover:border-purple-500/50 transition-all">
                        <div class="bg-gradient-to-br from-purple-600 to-indigo-600 rounded-2xl h-40 mb-4 flex items-center justify-center text-6xl">
                            ✅
                        </div>
                        <h3 class="text-xl font-bold mb-2">Todo App</h3>
                        <p class="text-gray-400 text-sm mb-4">Aplikasi todo list dengan fitur drag & drop dan dark mode</p>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 bg-purple-500/20 rounded-full text-xs">React</span>
                            <span class="px-3 py-1 bg-indigo-500/20 rounded-full text-xs">Tailwind</span>
                        </div>
                    </div>

                    <!-- Project 2 -->
                    <div class="bg-gradient-to-br from-indigo-500/10 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-indigo-500/20 hover:border-indigo-500/50 transition-all">
                        <div class="bg-gradient-to-br from-indigo-600 to-blue-600 rounded-2xl h-40 mb-4 flex items-center justify-center text-6xl">
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
                    <div class="bg-gradient-to-br from-violet-500/10 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-violet-500/20 hover:border-violet-500/50 transition-all">
                        <div class="bg-gradient-to-br from-violet-600 to-purple-600 rounded-2xl h-40 mb-4 flex items-center justify-center text-6xl">
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
                    <div class="bg-gradient-to-br from-purple-500/10 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-purple-500/20 hover:border-purple-500/50 transition-all">
                        <div class="bg-gradient-to-br from-purple-600 to-pink-600 rounded-2xl h-40 mb-4 flex items-center justify-center text-6xl">
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
                    <div class="bg-gradient-to-br from-indigo-500/10 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-indigo-500/20 hover:border-indigo-500/50 transition-all">
                        <div class="bg-gradient-to-br from-indigo-600 to-cyan-600 rounded-2xl h-40 mb-4 flex items-center justify-center text-6xl">
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
                    <div class="bg-gradient-to-br from-violet-500/10 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-violet-500/20 hover:border-violet-500/50 transition-all">
                        <div class="bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-2xl h-40 mb-4 flex items-center justify-center text-6xl">
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
                    <span class="inline-block px-6 py-2 bg-yellow-400/20 text-yellow-300 font-semibold rounded-full text-lg border border-yellow-400/30 shadow">
                        Segera Hadir
                    </span>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="relative">
                        <div class="bg-gradient-to-br from-purple-500/20 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-purple-500/30">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-14 h-14 rounded-full bg-gradient-to-r from-purple-500 to-pink-500"></div>
                                <div>
                                    <h4 class="font-bold">Rani Putri</h4>
                                    <p class="text-sm text-gray-400">Frontend Dev</p>
                                </div>
                            </div>
                            <p class="text-gray-300">"Baricode ngubah cara gue belajar coding. Dari yang males-malesan jadi konsisten tiap hari. Daily commit tracker-nya bikin gue ketagihan!"</p>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="relative">
                        <div class="bg-gradient-to-br from-indigo-500/20 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-indigo-500/30">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-14 h-14 rounded-full bg-gradient-to-r from-indigo-500 to-blue-500"></div>
                                <div>
                                    <h4 class="font-bold">Dimas Aji</h4>
                                    <p class="text-sm text-gray-400">Backend Dev</p>
                                </div>
                            </div>
                            <p class="text-gray-300">"Komunitas yang paling supportive! Gue dari nol banget, sekarang udah bisa bikin full-stack app. Thanks Baricode!"</p>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="relative">
                        <div class="bg-gradient-to-br from-violet-500/20 to-transparent backdrop-blur-lg rounded-3xl p-6 border border-violet-500/30">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-14 h-14 rounded-full bg-gradient-to-r from-violet-500 to-purple-500"></div>
                                <div>
                                    <h4 class="font-bold">Lina Safitri</h4>
                                    <p class="text-sm text-gray-400">Mobile Dev</p>
                                </div>
                            </div>
                            <p class="text-gray-300">"Hackathon mini-nya seru banget! Jadi ajang buat praktik skill baru sambil dapet feedback dari senior."</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final CTA -->
        <section class="py-32 px-4 relative">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-5xl md:text-6xl font-bold mb-6">
                    Ayo mulai perjalanan ngodingmu.<br/>
                    <span class="bg-gradient-to-r from-purple-400 to-indigo-400 bg-clip-text text-transparent">
                        Gratis untuk selamanya.
                    </span>
                </h2>
                <p class="text-xl text-gray-300 mb-10">
                    Bergabunglah dengan ribuan developer yang udah berkembang bareng kami.
                </p>
                <button class="px-12 py-5 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-3xl font-bold text-xl hover:shadow-2xl hover:shadow-purple-500/50 transition-all transform hover:scale-105">
                    Daftar Sekarang — Gratis
                </button>
            </div>
        </section>
    </div>
</x-layouts.base>