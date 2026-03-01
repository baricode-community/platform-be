<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body>
    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-white/10">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-900 dark:text-white">Baricode Community</a>
            </div>
        </div>
    </nav>

    
    
    <div class="min-h-screen bg-gradient-to-br from-white via-gray-50 to-gray-100 dark:from-gray-900 dark:via-purple-900 dark:to-indigo-900 text-gray-900 dark:text-white">
        <div class="max-w-5xl px-4 py-8 md:px-8">
                @if (isset($slot))
        {{ $slot }}
    @else
        @yield('content')
    @endif

        </div>
    </div>

    @fluxScripts
</body>

</html>
