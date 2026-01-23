
<x-layouts.base :title="__('Profile Pengguna')">
    {{-- Navbar --}}
    <nav class="bg-white dark:bg-gray-900 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <span class="ml-2 text-xl font-bold text-indigo-600 dark:text-indigo-300">Baricoder</span>
                    </a>
                </div>
                <div class="flex items-center">
                    @auth
                        <a href="{{ route('dashboard') }}"
                        class="text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400 px-3 py-2 rounded-md text-sm font-medium">
                        {{ __('Dashboard') }}
                    </a>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}"
                        class="text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400 px-3 py-2 rounded-md text-sm font-medium">
                        {{ __('Masuk') }}
                    </a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-200 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-12 px-2">
        <div class="max-w-xl w-full bg-white dark:bg-gray-900 shadow-2xl rounded-3xl p-10 transition-transform duration-300 hover:scale-105 hover:shadow-indigo-300/40">
            <div class="flex flex-col sm:flex-row items-center sm:space-x-8 mb-8">
                <div class="mt-6 sm:mt-0 text-center sm:text-left">
                    <h2 class="text-4xl font-extrabold text-indigo-700 dark:text-indigo-300 mb-2">{{ $user->name }}</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-lg mb-2">{{ '@' . $user->username }}</p>
                </div>
            </div>
            <div class="mb-8">
                <h3 class="text-2xl font-semibold text-indigo-600 dark:text-indigo-300 mb-3">Tentang Saya</h3>
                <p class="text-gray-800 dark:text-gray-200 leading-relaxed text-lg">
                    {{ $user->bio ?? 'Belum ada bio tersedia.' }}
                </p>
            </div>
            @auth
                @if (auth()->user()->id === $user->id)
                    <form method="POST" action="{{ route('logout') }}" class="flex justify-end">
                        @csrf
                        <button type="submit"
                            class="px-8 py-3 bg-gradient-to-r from-pink-500 via-indigo-500 to-purple-500 text-white font-bold rounded-xl shadow-lg hover:from-indigo-600 hover:to-pink-600 transition-all duration-300">
                            {{ __('Keluar') }}
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</x-layouts.base>
