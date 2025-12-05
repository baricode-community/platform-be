<!-- Header with Dark Mode Toggle -->
<div class="sticky top-0 z-20 border-b border-slate-200 bg-white dark:border-slate-700 dark:bg-slate-900">
    <div class="flex items-center justify-between px-4 py-3 sm:px-6">
        <h1 class="text-lg font-semibold text-slate-900 dark:text-white">{{ $title ?? 'Dashboard' }}</h1>
        
        <!-- Dark Mode Toggle & User Menu -->
        <div class="flex items-center space-x-4">
            <!-- Dark Mode Toggle Button -->
            <button 
                onclick="toggleDarkMode()"
                class="rounded-lg p-2 text-slate-600 transition-colors hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800">
                <!-- Sun Icon (shown in dark mode) -->
                <svg class="hidden h-5 w-5 dark:block" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v2a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l-2.12-2.12a1 1 0 00-1.414 1.414l2.12 2.12a1 1 0 001.414-1.414zM2.05 6.464A1 1 0 103.464 5.05l-1.414 1.414zm5.657-9.19a1 1 0 00-1.414 0l-1.414 1.414a1 1 0 101.414 1.414l1.414-1.414zm4.95 2.12a1 1 0 10-1.414-1.414l-2.12 2.12a1 1 0 101.414 1.414l2.12-2.12zM5 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                </svg>
                
                <!-- Moon Icon (shown in light mode) -->
                <svg class="h-5 w-5 dark:hidden" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
            </button>

            @auth
                <!-- User Dropdown Menu -->
                <div class="relative group">
                    <button class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-white hover:bg-blue-700">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </button>
                    
                    <div class="absolute right-0 mt-2 hidden w-48 rounded-lg border border-slate-200 bg-white shadow-lg group-hover:block dark:border-slate-700 dark:bg-slate-800">
                        <div class="border-b border-slate-200 px-4 py-3 dark:border-slate-700">
                            <p class="text-sm font-semibold text-slate-900 dark:text-white">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-slate-600 dark:text-slate-400">{{ auth()->user()->email }}</p>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-700">Profile</a>
                        <a href="{{ route('appearance.edit') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-700">Appearance</a>
                        <form method="POST" action="{{ route('logout') }}" class="border-t border-slate-200 dark:border-slate-700">
                            @csrf
                            <button type="submit" class="w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-slate-100 dark:text-red-400 dark:hover:bg-slate-700">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>
