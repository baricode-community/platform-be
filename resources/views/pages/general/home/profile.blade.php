<x-layouts.base :title="__('Profile Pengguna')">
    <div class="container mx-auto px-4 py-12">
        <div class="bg-white dark:bg-gray-900 shadow-lg rounded-2xl p-8">
            <div class="flex items-center space-x-8 mb-8">
                <img class="w-28 h-28 rounded-full object-cover border-4 border-indigo-200 dark:border-indigo-700 shadow"
                    src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                <div>
                    <h2 class="text-3xl font-bold text-indigo-700 dark:text-indigo-300">{{ $user->name }}</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-lg">{{ '@' . $user->username }}</p>
                </div>
            </div>
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-indigo-600 dark:text-indigo-300 mb-2">Tentang Saya</h3>
                <p class="text-gray-800 dark:text-gray-200 leading-relaxed">
                    {{ $user->bio ?? 'Belum ada bio tersedia.' }}</p>
            </div>
            @auth
                @if (auth()->user()->id === $user->id)
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="mt-4 px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                            {{ __('Keluar') }}
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</x-layouts.base>
