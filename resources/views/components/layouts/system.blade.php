<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
    <script>
        // Handle dark mode on page load
        function initDarkMode() {
            const isDark = localStorage.getItem('theme') === 'dark' || 
                          (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
            
            if (isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
        initDarkMode();
    </script>
</head>

<body class="bg-slate-50 dark:bg-slate-950">
    <div class="flex h-screen">
        <!-- Livewire Sidebar Component -->
        <livewire:components.system.sidebar />

        <!-- Main Content -->
        <main class="flex-1 flex flex-col overflow-hidden">
            <x-sidebar.system.header :title="$title ?? 'Dashboard'" />
            
            <section class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                {{ $slot }}
            </section>
        </main>
    </div>

    @fluxScripts
    
    <script>
        // Dark mode toggle function
        function toggleDarkMode() {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        }
    </script>
</body>

</html>
