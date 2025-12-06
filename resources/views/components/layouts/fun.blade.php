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
                <a href="{{ route('dashboard.fun') }}" class="text-lg font-bold text-white drop-shadow-lg hover:text-yellow-200 transition">
                    {{ __('Baricode Fun') }}
                </a>
            </div>
        </div>
    </nav>
    
    {{ $slot }}

    @fluxScripts
</body>

</html>
