<x-layouts.system :title="__('Daftar Pengguna')">
    <div class="mb-12">
        <h1 class="text-4xl font-bold text-white mb-2">{{ __('Daftar Pengguna') }}</h1>
        <p class="text-gray-300">{{ __('Kelola dan tinjau semua pengguna yang terdaftar dalam sistem.') }}</p>
    </div>

    <!-- Users Management Section -->
    <livewire:system.general.users-management />
</x-layouts.system>