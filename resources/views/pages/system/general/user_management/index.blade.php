<x-layouts.system :title="__('Daftar Pengguna')">
    <div class="mb-6 flex items-center justify-between bg-white p-6 rounded shadow">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">{{ __('Manajemen Pengguna') }}</h1>
            <p class="text-gray-600">{{ __('Impor atau ekspor data pengguna dengan mudah.') }}</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('system.user_management.import') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                {{ __('Import User') }}
            </a>
            <a href="{{ route('system.user_management.export') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                {{ __('Export User') }}
            </a>
        </div>
    </div>
    <livewire:system.general.user_management.list />
</x-layouts.system>