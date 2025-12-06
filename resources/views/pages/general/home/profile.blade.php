<x-layouts.base :title="__('Profile Pengguna')">
    <div class="container mx-auto px-4 py-12">
        <div class="bg-white dark:bg-gray-900 shadow-lg rounded-2xl p-8 max-w-2xl mx-auto">
            <div class="flex items-center space-x-8 mb-8">
                <img class="w-28 h-28 rounded-full object-cover border-4 border-indigo-200 dark:border-indigo-700 shadow" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                <div>
                    <h2 class="text-3xl font-bold text-indigo-700 dark:text-indigo-300">{{ $user->name }}</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-lg">{{ '@' . $user->username }}</p>
                </div>
            </div>
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-indigo-600 dark:text-indigo-300 mb-2">Tentang Saya</h3>
                <p class="text-gray-800 dark:text-gray-200 leading-relaxed">{{ $user->bio ?? 'Belum ada bio tersedia.' }}</p>
            </div>
            <div>
                <h3 class="text-xl font-semibold text-indigo-600 dark:text-indigo-300 mb-2">Informasi Kontak</h3>
                <div class="space-y-1">
                    <p class="text-gray-800 dark:text-gray-200"><span class="font-medium">Email:</span> {{ $user->email }}</p>
                    @if($user->phone)
                        <p class="text-gray-800 dark:text-gray-200"><span class="font-medium">Telepon:</span> {{ $user->phone }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.base>
