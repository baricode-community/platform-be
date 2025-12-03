<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body>
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-pink-500 via-yellow-400 to-green-400 border-b border-white/10 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-16">
            <div class="flex items-center space-x-3">
                <span class="text-3xl animate-bounce">🎉</span>
                <a href="{{ route('memes') }}" class="text-2xl font-extrabold text-white drop-shadow-lg hover:text-yellow-200 transition">
                    Baricode Bergembira
                </a>
            </div>
            <div class="flex items-center space-x-6">
                <a href="{{ route('dashboard') }}" class="text-white hover:text-pink-500 font-semibold transition">
                    <span class="mr-1">🏠</span>Dashboard Utama
                </a>
            </div>
        </div>
    </nav>
    
    {{ $slot }}

    @fluxScripts
</body>

</html>
