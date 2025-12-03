<x-layouts.fun :title="__('Ungkapkan dengan Seni')">
    <div class="py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Create Meme Section -->
            <div class="mb-12" id="create-meme">
                <livewire:fun.create-meme />
            </div>

            <!-- Memes Gallery Section -->
            <livewire:fun.memes-gallery />
        </div>
    </div>
</x-layouts.fun>
