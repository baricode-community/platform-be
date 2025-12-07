<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body>
    <!-- Navbar -->
    <nav class="bg-gray-900 border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="text-xl font-bold text-white">Baricode Community</a>
            </div>
        </div>
    </nav>

    
    
    {{ $slot }}

    @fluxScripts
</body>

</html>
