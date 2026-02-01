<x-layouts.dashboard :title="__('Pengaturan Platform')">
    <section class="container mx-auto p-6 space-y-8">
        <div>
            <h1 class="text-3xl font-bold tracking-tight mb-6 text-gray-900 dark:text-gray-100">Pengaturan Platform</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- System Settings -->
            <div
                class="rounded-2xl p-6 shadow-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 hover:shadow-xl transition duration-200">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Pengaturan Sistem</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">Atur konfigurasi sistem, termasuk
                    integrasi dan API.</p>
                <a href="" class="text-blue-600 dark:text-blue-400 font-medium hover:underline">Segera Hadir</a>
            </div>

            <!-- Appearance Settings -->
            <div
                class="rounded-2xl p-6 shadow-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 hover:shadow-xl transition duration-200">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Pengaturan Tampilan</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">Sesuaikan tema dan tata letak platform.
                </p>

                <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
                    <flux:radio value="light" icon="sun">{{ __('Light') }}</flux:radio>
                    <flux:radio value="dark" icon="moon">{{ __('Dark') }}</flux:radio>
                    <flux:radio value="system" icon="computer-desktop">{{ __('System') }}</flux:radio>
                </flux:radio.group>
            </div>

            {{-- Sign Out --}}
            <div
                class="rounded-2xl p-6 shadow-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 hover:shadow-xl transition duration-200">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Keluar</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">Keluar dari akun Anda dengan aman.
                </p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <flux:button type="submit" variant="danger">{{ __('Sign Out') }}</flux:button>
                </form>
            </div>
        </div>
    </section>
</x-layouts.dashboard>
