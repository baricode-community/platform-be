<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body>

    <!-- Background Code Snippets -->
    <div class="fixed inset-0 opacity-5 pointer-events-none">
        <pre class="text-purple-300 text-sm">
function learn() {
    const skills = ['HTML', 'CSS', 'JS'];
    return skills.map(skill => master(skill));
}
            </pre>
    </div>
    
    {{ $slot }}

    <!-- Footer -->
    <footer class="py-12 px-4 border-t border-white/10">
        <div class="max-w-7xl mx-auto text-center text-gray-400">
            <p class="mb-4">© {{ date('Y') }} Baricode Community. Made with 💜 by Indonesian Developers</p>
        </div>
    </footer>

    @fluxScripts
</body>

</html>
