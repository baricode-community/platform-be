@props(['active' => false])

<aside id="sidebar"
    class="fixed left-0 top-0 z-40 h-screen w-64 bg-white transition-transform duration-300 ease-in-out dark:bg-slate-900 flex flex-col -translate-x-full lg:static lg:translate-x-0 lg:w-64">

    <!-- Header -->
    <div class="border-b border-slate-200 p-4 dark:border-slate-700 flex-shrink-0">
        <a href="{{ route('home') }}" class="flex items-center space-x-2">
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600 text-white font-bold">
                BC
            </div>
            <span class="hidden text-lg font-bold text-slate-900 dark:text-white sm:block">Baricode System</span>
        </a>
    </div>

    <!-- Navigation Content -->
    <nav class="flex-1 overflow-y-auto py-4">
        <div class="space-y-6 px-3">

            <!-- Dashboard Category -->
            <div>
                <h3 class="mb-2 px-3 text-xs font-semibold uppercase text-slate-500 dark:text-slate-400">
                    Dashboard
                </h3>
                <div class="space-y-1">
                    <x-sidebar.system.nav-link href="{{ route('dashboard') }}" icon="dashboard">
                        Dashboard
                    </x-sidebar.system.nav-link>
                    <x-sidebar.system.nav-link href="{{ route('dashboard.analytics') }}" icon="chart">
                        Analytics
                    </x-sidebar.system.nav-link>
                    <x-sidebar.system.nav-link href="{{ route('dashboard.memes') }}" icon="image">
                        My Memes
                    </x-sidebar.system.nav-link>
                </div>
            </div>

            <!-- Fun Category -->
            <div>
                <h3 class="mb-2 px-3 text-xs font-semibold uppercase text-slate-500 dark:text-slate-400">
                    Fun
                </h3>
                <div class="space-y-1">
                    <x-sidebar.system.nav-link href="{{ route('memes') }}" icon="laugh">
                        Browse Memes
                    </x-sidebar.system.nav-link>
                    <x-sidebar.system.nav-link href="{{ route('memes.create') }}" icon="plus">
                        Create Meme
                    </x-sidebar.system.nav-link>
                    <x-sidebar.system.nav-link href="{{ route('memes.user_list') }}" icon="users">
                        Meme Creators
                    </x-sidebar.system.nav-link>
                </div>
            </div>

            <!-- System Category -->
            <div>
                <h3 class="mb-2 px-3 text-xs font-semibold uppercase text-slate-500 dark:text-slate-400">
                    System
                </h3>
                <div class="space-y-1">
                    <x-sidebar.system.nav-link href="{{ route('system.index') }}" icon="settings">
                        Settings
                    </x-sidebar.system.nav-link>
                    <x-sidebar.system.nav-link href="{{ route('system.import') }}" icon="upload">
                        Import Data
                    </x-sidebar.system.nav-link>
                </div>
            </div>

            <!-- Settings Category -->
            <div>
                <h3 class="mb-2 px-3 text-xs font-semibold uppercase text-slate-500 dark:text-slate-400">
                    Account
                </h3>
                <div class="space-y-1">
                    <x-sidebar.system.nav-link href="{{ route('profile.edit') }}" icon="user">
                        Profile
                    </x-sidebar.system.nav-link>
                    <x-sidebar.system.nav-link href="{{ route('user-password.edit') }}" icon="lock">
                        Password
                    </x-sidebar.system.nav-link>
                    <x-sidebar.system.nav-link href="{{ route('appearance.edit') }}" icon="palette">
                        Appearance
                    </x-sidebar.system.nav-link>
                    <x-sidebar.system.nav-link href="{{ route('two-factor.show') }}" icon="shield">
                        Two Factor Auth
                    </x-sidebar.system.nav-link>
                </div>
            </div>

        </div>
    </nav>
</aside>

<!-- Sidebar Overlay (Mobile) -->
<div id="sidebarOverlay"
    class="fixed inset-0 z-30 hidden bg-black/50 transition-opacity duration-300 lg:hidden"
    onclick="toggleSidebar()"></div>
