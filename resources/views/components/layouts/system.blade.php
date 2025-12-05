<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body>
    <section class="m-3">
        {{ $slot }}
    </section>

    <!-- Footer -->
    <footer class="py-12 px-4 border-t border-white/10">
        <div class="max-w-7xl mx-auto text-center text-gray-400">
            <p class="mb-4">© {{ date('Y') }} Baricode Community. Made with 💜 by Indonesian Developers</p>
        </div>
    </footer>

    @fluxScripts
</body>

</html>
