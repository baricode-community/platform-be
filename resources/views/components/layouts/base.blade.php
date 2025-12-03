<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body>
    {{ $slot }}

    <!-- Footer -->
    <footer class="py-12 px-4 border-t border-white/10">
        <div class="max-w-7xl mx-auto text-center text-gray-400">
            <p class="mb-4">© 2024 Baricode. Made with 💜 by Indonesian Developers</p>
            <div class="flex justify-center gap-8">
                <a href="#" class="hover:text-purple-400 transition-colors">Discord</a>
                <a href="#" class="hover:text-purple-400 transition-colors">GitHub</a>
                <a href="#" class="hover:text-purple-400 transition-colors">Instagram</a>
                <a href="#" class="hover:text-purple-400 transition-colors">Twitter</a>
            </div>
        </div>
    </footer>

    @fluxScripts
</body>

</html>
