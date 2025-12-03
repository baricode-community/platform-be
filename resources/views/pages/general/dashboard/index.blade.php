<x-layouts.dashboard :title="__('Dashboard')">
    <section class="bg-purple-700 text-white py-12">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl font-bold">Selamat datang kembali, {{ auth()->user()->name }} 👋</h1>
            <p class="opacity-90">Tetap konsisten membangun skill kamu hari ini.</p>
        </div>
    </section>
</x-layouts.dashboard>
