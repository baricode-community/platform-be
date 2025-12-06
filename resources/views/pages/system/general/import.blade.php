<x-layouts.system :title="__('Impor Data')">
    <div class="mb-12">
        <h1 class="text-4xl font-bold text-white mb-2">{{ __('Impor Data') }}</h1>
        <p class="text-gray-300">{{ __('Impor data umum ke dalam sistem dari file CSV.') }}</p>
    </div>


    <!-- Import General Data Section -->
    <ul class="list-disc pl-6 text-white">
        <li><livewire:system.general.import-user /></li>
    </ul>
</x-layouts.system>