<div>
    <!-- Mobile Toggle Button -->
    <button wire:click="toggleSidebar"
        class="fixed left-4 top-4 z-50 lg:hidden rounded-lg bg-slate-900 p-2 text-white hover:bg-slate-800 dark:bg-slate-700 dark:hover:bg-slate-600">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Sidebar Overlay (Mobile) -->
    @if($isOpen)
        <div wire:click="closeSidebar"
            class="fixed inset-0 z-30 bg-black/50 transition-opacity duration-300 lg:hidden">
        </div>
    @endif

    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 z-40 h-screen w-64 bg-white transition-all duration-300 ease-in-out dark:bg-slate-900 flex flex-col
        {{ $isOpen ? 'translate-x-0' : '-translate-x-full' }} lg:static lg:translate-x-0">

        <!-- Header -->
        <div class="border-b border-slate-200 p-4 h-15 dark:border-slate-700 flex-shrink-0">
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                <span class="hidden text-lg font-bold text-slate-900 dark:text-white sm:block">Baricode System</span>
            </a>
        </div>

        <!-- Navigation Content -->
        <nav class="flex-1 overflow-y-auto py-4">
            <div class="space-y-6 px-3">

                <!-- Dashboard Category -->
                <div>
                    <h3 class="mb-2 px-3 text-xs font-semibold uppercase text-slate-500 dark:text-slate-400">
                        Dashboard Pengelola
                    </h3>
                    <div class="space-y-1">
                        <a href="{{ route('system.index') }}" wire:click="closeSidebar"
                            class="group relative flex items-center space-x-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('system.index') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' }}">
                            <span class="flex h-5 w-5 items-center justify-center flex-shrink-0">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                            <span class="truncate">Halaman Utama</span>
                            @if(request()->routeIs('system.index'))
                                <span class="absolute left-0 top-0 h-full w-1 rounded-r-lg bg-blue-600"></span>
                            @endif
                        </a>

                        <a href="{{ route('dashboard') }}" wire:click="closeSidebar"
                            class="group relative flex items-center space-x-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' }}">
                            <span class="flex h-5 w-5 items-center justify-center flex-shrink-0">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 16l4-4m0 0l4 4m-4-4V5" />
                                </svg>
                            </span>
                            <span class="truncate">Dashboard</span>
                            @if(request()->routeIs('dashboard'))
                                <span class="absolute left-0 top-0 h-full w-1 rounded-r-lg bg-blue-600"></span>
                            @endif
                        </a>

                        <a href="{{ route('dashboard.analytics') }}" wire:click="closeSidebar"
                            class="group relative flex items-center space-x-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('dashboard.analytics') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' }}">
                            <span class="flex h-5 w-5 items-center justify-center flex-shrink-0">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </span>
                            <span class="truncate">Analytics</span>
                            @if(request()->routeIs('dashboard.analytics'))
                                <span class="absolute left-0 top-0 h-full w-1 rounded-r-lg bg-blue-600"></span>
                            @endif
                        </a>

                        <a href="{{ route('dashboard.memes') }}" wire:click="closeSidebar"
                            class="group relative flex items-center space-x-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('dashboard.memes') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' }}">
                            <span class="flex h-5 w-5 items-center justify-center flex-shrink-0">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <span class="truncate">My Memes</span>
                            @if(request()->routeIs('dashboard.memes'))
                                <span class="absolute left-0 top-0 h-full w-1 rounded-r-lg bg-blue-600"></span>
                            @endif
                        </a>
                    </div>
                </div>

                <!-- Fun Category -->
                <div>
                    <h3 class="mb-2 px-3 text-xs font-semibold uppercase text-slate-500 dark:text-slate-400">
                        Fun
                    </h3>
                    <div class="space-y-1">
                        <a href="{{ route('memes') }}" wire:click="closeSidebar"
                            class="group relative flex items-center space-x-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('memes') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' }}">
                            <span class="flex h-5 w-5 items-center justify-center flex-shrink-0">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            <span class="truncate">Browse Memes</span>
                            @if(request()->routeIs('memes'))
                                <span class="absolute left-0 top-0 h-full w-1 rounded-r-lg bg-blue-600"></span>
                            @endif
                        </a>

                        <a href="{{ route('memes.user_list') }}" wire:click="closeSidebar"
                            class="group relative flex items-center space-x-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('memes.user_list') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' }}">
                            <span class="flex h-5 w-5 items-center justify-center flex-shrink-0">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 8.048M12 4.354L8.646 7.708m6.708 0L15.354 7.708M9 20h6a4 4 0 004-4V8a4 4 0 00-4-4H9a4 4 0 00-4 4v8a4 4 0 004 4z" />
                                </svg>
                            </span>
                            <span class="truncate">Meme Creators</span>
                            @if(request()->routeIs('memes.user_list'))
                                <span class="absolute left-0 top-0 h-full w-1 rounded-r-lg bg-blue-600"></span>
                            @endif
                        </a>
                    </div>
                </div>

                <!-- System Category -->
                <div>
                    <h3 class="mb-2 px-3 text-xs font-semibold uppercase text-slate-500 dark:text-slate-400">
                        System
                    </h3>
                    <div class="space-y-1">
                        <a href="{{ route('system.export') }}" wire:click="closeSidebar"
                            class="group relative flex items-center space-x-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('system.export') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' }}">
                            <span class="flex h-5 w-5 items-center justify-center flex-shrink-0">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </span>
                            <span class="truncate">Export Data</span>
                            @if(request()->routeIs('system.export'))
                                <span class="absolute left-0 top-0 h-full w-1 rounded-r-lg bg-blue-600"></span>
                            @endif
                        </a>

                        <a href="{{ route('system.import') }}" wire:click="closeSidebar"
                            class="group relative flex items-center space-x-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('system.import') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' }}">
                            <span class="flex h-5 w-5 items-center justify-center flex-shrink-0">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                            </span>
                            <span class="truncate">Import Data</span>
                            @if(request()->routeIs('system.import'))
                                <span class="absolute left-0 top-0 h-full w-1 rounded-r-lg bg-blue-600"></span>
                            @endif
                        </a>
                    </div>
                </div>

                <!-- Account Category -->
                <div>
                    <h3 class="mb-2 px-3 text-xs font-semibold uppercase text-slate-500 dark:text-slate-400">
                        Account
                    </h3>
                    <div class="space-y-1">
                        <a href="{{ route('profile.edit') }}" wire:click="closeSidebar"
                            class="group relative flex items-center space-x-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('profile.edit') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' }}">
                            <span class="flex h-5 w-5 items-center justify-center flex-shrink-0">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="truncate">Profile</span>
                            @if(request()->routeIs('profile.edit'))
                                <span class="absolute left-0 top-0 h-full w-1 rounded-r-lg bg-blue-600"></span>
                            @endif
                        </a>

                        <a href="{{ route('user-password.edit') }}" wire:click="closeSidebar"
                            class="group relative flex items-center space-x-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('user-password.edit') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' }}">
                            <span class="flex h-5 w-5 items-center justify-center flex-shrink-0">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <span class="truncate">Password</span>
                            @if(request()->routeIs('user-password.edit'))
                                <span class="absolute left-0 top-0 h-full w-1 rounded-r-lg bg-blue-600"></span>
                            @endif
                        </a>

                        <a href="{{ route('appearance.edit') }}" wire:click="closeSidebar"
                            class="group relative flex items-center space-x-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('appearance.edit') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' }}">
                            <span class="flex h-5 w-5 items-center justify-center flex-shrink-0">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                </svg>
                            </span>
                            <span class="truncate">Appearance</span>
                            @if(request()->routeIs('appearance.edit'))
                                <span class="absolute left-0 top-0 h-full w-1 rounded-r-lg bg-blue-600"></span>
                            @endif
                        </a>

                        <a href="{{ route('two-factor.show') }}" wire:click="closeSidebar"
                            class="group relative flex items-center space-x-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('two-factor.show') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' }}">
                            <span class="flex h-5 w-5 items-center justify-center flex-shrink-0">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m7.784-4.817a.75.75 0 00-.961-.96l-10.39 10.39a.75.75 0 001.06 1.061l10.39-10.39zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            <span class="truncate">Two Factor Auth</span>
                            @if(request()->routeIs('two-factor.show'))
                                <span class="absolute left-0 top-0 h-full w-1 rounded-r-lg bg-blue-600"></span>
                            @endif
                        </a>
                    </div>
                </div>

            </div>
        </nav>
    </aside>
</div>
