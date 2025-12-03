<?php

use App\Models\Fun\Meme;
use Livewire\Volt\Component;

new class extends Component {
    public $currentPage = 1;
    public $perPage = 1;
    public $sortBy = 'latest';
    public $memes = [];
    public $totalMemes = 0;
    public $currentMeme = null;

    public function mount()
    {
        $this->loadMemes();
    }

    public function loadMemes()
    {
        $query = Meme::query();

        if ($this->sortBy === 'latest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($this->sortBy === 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        $this->totalMemes = $query->count();
        $skip = ($this->currentPage - 1) * $this->perPage;
        
        $meme = $query->skip($skip)->first();
        $this->currentMeme = $meme;
    }

    public function nextMeme()
    {
        if ($this->currentPage < ceil($this->totalMemes / $this->perPage)) {
            $this->currentPage++;
            $this->loadMemes();
        }
    }

    public function previousMeme()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
            $this->loadMemes();
        }
    }

    public function updatedSortBy()
    {
        $this->currentPage = 1;
        $this->loadMemes();
    }

    #[\Livewire\Attributes\On('meme-created')]
    public function refreshMemes()
    {
        $this->currentPage = 1;
        $this->loadMemes();
    }
}; ?>

<div class="mt-16">
    <div class="mb-8 flex items-center justify-between">
        <h2 class="text-3xl font-bold text-white">{{ __('Feed Meme') }}</h2>
        
        <!-- Sort Options -->
        <div class="flex items-center gap-3">
            <label for="sort" class="text-sm text-gray-300">{{ __('Urutkan:') }}</label>
            <select
                id="sort"
                wire:model.live="sortBy"
                class="px-4 py-2 bg-white/5 border border-purple-500/30 rounded-lg text-white text-sm focus:outline-none focus:border-purple-500/60 focus:ring-2 focus:ring-purple-500/20 transition-all"
            >
                <option value="latest">{{ __('Terbaru') }}</option>
                <option value="oldest">{{ __('Tertua') }}</option>
            </select>
        </div>
    </div>

    @if ($currentMeme)
        <!-- Meme Container -->
        <div class="mb-8">
            <div class="bg-gradient-to-br from-purple-500/10 to-indigo-500/10 backdrop-blur-xl rounded-3xl p-8 border border-purple-500/20 overflow-hidden">
                
                <!-- Header dengan User Info -->
                <div class="flex items-center gap-4 mb-6 pb-6 border-b border-purple-500/20">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-400 to-indigo-400 flex items-center justify-center text-white font-bold">
                        {{ substr($currentMeme->user->name, 0, 1) }}
                    </div>
                    <div>
                        <a
                            href="{{ route('profile', $currentMeme->user->username) }}"
                            class="text-white font-semibold hover:text-purple-300 transition-colors"
                            wire:navigate
                        >
                            {{ $currentMeme->user->name }}
                        </a>
                        <p class="text-sm text-gray-400">@{{ $currentMeme->user->username }}</p>
                    </div>
                </div>

                <!-- Meme Image -->
                <div class="w-full mb-6 rounded-2xl overflow-hidden bg-black/30">
                    <img
                        src="{{ asset('storage/' . $currentMeme->image_path) }}"
                        alt="{{ $currentMeme->caption ?? 'Meme' }}"
                        class="w-full h-auto object-cover"
                    />
                </div>

                <!-- Caption -->
                @if ($currentMeme->caption)
                    <div class="mb-6 p-4 bg-white/5 rounded-xl border border-purple-500/10">
                        <p class="text-gray-200 text-lg leading-relaxed">{{ $currentMeme->caption }}</p>
                    </div>
                @endif

                <!-- Actions Bar -->
                <div class="flex items-center justify-between pb-6 border-b border-purple-500/20 mb-6">
                    <div class="flex gap-4">
                        <button
                            class="flex items-center gap-2 px-4 py-2 bg-purple-500/20 border border-purple-500/30 rounded-xl hover:bg-purple-500/30 transition-colors text-purple-300 hover:text-purple-200 group"
                            title="{{ __('Suka') }}"
                        >
                            <span class="text-2xl group-hover:scale-125 transition-transform">❤️</span>
                            <span class="text-sm font-medium">0</span>
                        </button>
                        <button
                            class="flex items-center gap-2 px-4 py-2 bg-indigo-500/20 border border-indigo-500/30 rounded-xl hover:bg-indigo-500/30 transition-colors text-indigo-300 hover:text-indigo-200"
                            title="{{ __('Bagikan') }}"
                        >
                            <span class="text-2xl">💬</span>
                            <span class="text-sm font-medium">0</span>
                        </button>
                        <button
                            class="flex items-center gap-2 px-4 py-2 bg-pink-500/20 border border-pink-500/30 rounded-xl hover:bg-pink-500/30 transition-colors text-pink-300 hover:text-pink-200"
                            title="{{ __('Bagikan') }}"
                        >
                            <span class="text-2xl">🔗</span>
                        </button>
                    </div>
                    
                    <div class="text-sm text-gray-400">
                        {{ $currentMeme->created_at->diffForHumans() }}
                    </div>
                </div>

                <!-- Post Info -->
                <div class="text-xs text-gray-400 text-center">
                    <span class="inline-block">{{ __('Meme') }} #{{ $currentMeme->id }}</span>
                </div>
            </div>
        </div>

        <!-- Navigation Controls -->
        <div class="flex items-center justify-center gap-4 mb-8">
            <button
                wire:click="previousMeme"
                :disabled="$currentPage <= 1"
                class="px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl font-semibold text-white hover:shadow-2xl hover:shadow-purple-500/50 transition-all transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 flex items-center gap-2"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                {{ __('Sebelumnya') }}
            </button>

            <div class="text-center">
                <p class="text-gray-300 font-semibold">
                    {{ $currentPage }}<span class="text-gray-500">/{{ ceil($totalMemes / $perPage) }}</span>
                </p>
                <p class="text-sm text-gray-400">{{ __('dari') }} {{ $totalMemes }} {{ __('meme') }}</p>
            </div>

            <button
                wire:click="nextMeme"
                :disabled="$currentPage >= ceil($totalMemes / $perPage)"
                class="px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl font-semibold text-white hover:shadow-2xl hover:shadow-purple-500/50 transition-all transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 flex items-center gap-2"
            >
                {{ __('Berikutnya') }}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    @else
        <!-- Empty State -->
        <div class="text-center py-20">
            <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-purple-500/10 border border-purple-500/20 mb-6">
                <svg class="w-12 h-12 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-semibold text-white mb-3">{{ __('Belum Ada Meme') }}</h3>
            <p class="text-gray-400 mb-8 max-w-md mx-auto">{{ __('Jadilah yang pertama membuat meme di komunitas kami! Bagikan kreativitasmu dan buat orang lain tertawa.') }}</p>
            <a
                href="#create-meme"
                class="inline-block px-8 py-4 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl font-semibold text-white hover:shadow-2xl hover:shadow-purple-500/50 transition-all transform hover:scale-105"
            >
                {{ __('Buat Meme Pertamamu') }}
            </a>
        </div>
    @endif
</div>
