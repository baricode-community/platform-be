@php
    // Collect all categories and items
    $menuItems = [
        'Dashboard' => [
            ['name' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'dashboard'],
            ['name' => 'Analytics', 'route' => 'dashboard.analytics', 'icon' => 'chart'],
            ['name' => 'My Memes', 'route' => 'dashboard.memes', 'icon' => 'image'],
        ],
        'Fun' => [
            ['name' => 'Browse Memes', 'route' => 'memes', 'icon' => 'laugh'],
            ['name' => 'Create Meme', 'route' => 'memes.create', 'icon' => 'plus'],
            ['name' => 'Meme Creators', 'route' => 'memes.user_list', 'icon' => 'users'],
        ],
        'System' => [
            ['name' => 'Settings', 'route' => 'system.index', 'icon' => 'settings'],
            ['name' => 'Import Data', 'route' => 'system.import', 'icon' => 'upload'],
        ],
        'Account' => [
            ['name' => 'Profile', 'route' => 'profile.edit', 'icon' => 'user'],
            ['name' => 'Password', 'route' => 'user-password.edit', 'icon' => 'lock'],
            ['name' => 'Appearance', 'route' => 'appearance.edit', 'icon' => 'palette'],
            ['name' => 'Two Factor Auth', 'route' => 'two-factor.show', 'icon' => 'shield'],
        ],
    ];
@endphp

<x-layouts.system title="Sidebar Component Demo">
    <div class="space-y-8">
        <!-- Header -->
        <div>
            <h1 class="text-4xl font-bold text-slate-900 dark:text-white">Sidebar Component</h1>
            <p class="mt-2 text-lg text-slate-600 dark:text-slate-400">
                Responsive sidebar dengan dark mode support dan categorized menu items
            </p>
        </div>

        <!-- Features -->
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/30">
                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </div>
                <h3 class="mt-4 font-semibold text-slate-900 dark:text-white">Responsive</h3>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Mobile & desktop optimized</p>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-yellow-100 dark:bg-yellow-900/30">
                    <svg class="h-6 w-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                </div>
                <h3 class="mt-4 font-semibold text-slate-900 dark:text-white">Dark Mode</h3>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Light & dark themes</p>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-green-100 dark:bg-green-900/30">
                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="mt-4 font-semibold text-slate-900 dark:text-white">Categorized</h3>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Organized menu items</p>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-purple-100 dark:bg-purple-900/30">
                    <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="mt-4 font-semibold text-slate-900 dark:text-white">Nice Icons</h3>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">12+ built-in icons</p>
            </div>
        </div>

        <!-- Menu Structure -->
        <div>
            <h2 class="mb-6 text-2xl font-bold text-slate-900 dark:text-white">Menu Structure</h2>
            <div class="grid gap-6 lg:grid-cols-2">
                @foreach ($menuItems as $category => $items)
                    <div class="rounded-lg border border-slate-200 bg-white p-6 dark:border-slate-700 dark:bg-slate-800">
                        <h3 class="mb-4 text-lg font-semibold text-slate-900 dark:text-white">{{ $category }}</h3>
                        <ul class="space-y-2">
                            @foreach ($items as $item)
                                <li class="flex items-center space-x-3 text-slate-700 dark:text-slate-300">
                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-400">
                                        @switch($item['icon'])
                                            @case('dashboard')
                                                📊
                                                @break
                                            @case('chart')
                                                📈
                                                @break
                                            @case('image')
                                                🖼️
                                                @break
                                            @case('laugh')
                                                😂
                                                @break
                                            @case('plus')
                                                ➕
                                                @break
                                            @case('users')
                                                👥
                                                @break
                                            @case('settings')
                                                ⚙️
                                                @break
                                            @case('download')
                                                📥
                                                @break
                                            @case('upload')
                                                📤
                                                @break
                                            @case('user')
                                                👤
                                                @break
                                            @case('lock')
                                                🔒
                                                @break
                                            @case('palette')
                                                🎨
                                                @break
                                            @case('shield')
                                                🛡️
                                                @break
                                        @endswitch
                                    </span>
                                    <span>{{ $item['name'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- How to Use -->
        <div>
            <h2 class="mb-4 text-2xl font-bold text-slate-900 dark:text-white">How to Use</h2>
            <div class="space-y-4">
                <div class="rounded-lg border border-slate-200 bg-white p-6 dark:border-slate-700 dark:bg-slate-800">
                    <h3 class="mb-3 font-semibold text-slate-900 dark:text-white">1. Use Layout</h3>
                    <pre class="overflow-x-auto rounded-lg bg-slate-100 p-4 text-sm dark:bg-slate-900"><code>&lt;x-layouts.system title="Your Page"&gt;
    &lt;div&gt;Your content&lt;/div&gt;
&lt;/x-layouts.system&gt;</code></pre>
                </div>

                <div class="rounded-lg border border-slate-200 bg-white p-6 dark:border-slate-700 dark:bg-slate-800">
                    <h3 class="mb-3 font-semibold text-slate-900 dark:text-white">2. Toggle Dark Mode</h3>
                    <button onclick="toggleDarkMode()" class="inline-flex items-center space-x-2 rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                        <svg class="hidden h-5 w-5 dark:block" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v2a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l-2.12-2.12a1 1 0 00-1.414 1.414l2.12 2.12a1 1 0 001.414-1.414zM2.05 6.464A1 1 0 103.464 5.05l-1.414 1.414zm5.657-9.19a1 1 0 00-1.414 0l-1.414 1.414a1 1 0 101.414 1.414l1.414-1.414zm4.95 2.12a1 1 0 10-1.414-1.414l-2.12 2.12a1 1 0 101.414 1.414l2.12-2.12zM5 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                        <svg class="h-5 w-5 dark:hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <span>Click to Toggle Dark Mode</span>
                    </button>
                </div>

                <div class="rounded-lg border border-slate-200 bg-white p-6 dark:border-slate-700 dark:bg-slate-800">
                    <h3 class="mb-3 font-semibold text-slate-900 dark:text-white">3. Customize Menu</h3>
                    <p class="text-slate-600 dark:text-slate-400">Edit <code class="rounded bg-slate-100 px-2 py-1 text-sm dark:bg-slate-900">resources/views/components/sidebar/main.blade.php</code> to add/modify menu items</p>
                </div>
            </div>
        </div>

        <!-- Documentation Link -->
        <div class="rounded-lg border border-slate-200 bg-blue-50 p-6 dark:border-slate-700 dark:bg-blue-900/20">
            <p class="text-slate-700 dark:text-slate-300">
                📖 For more details, check <code class="rounded bg-slate-100 px-2 py-1 text-sm dark:bg-slate-900">docs/SIDEBAR_COMPONENT.md</code>
            </p>
        </div>
    </div>
</x-layouts.system>
