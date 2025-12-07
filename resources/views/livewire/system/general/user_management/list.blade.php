<?php

use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\User;

new class extends Component {
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    #[\Livewire\Attributes\Computed]
    public function users()
    {
        return User::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone_number', 'like', '%' . $this->search . '%')
                    ->orWhere('username', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function sortBy($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }
}; ?>

<div class="dark:bg-gradient-to-br p-4 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 bg-gradient-to-br from-gray-50 to-white">
    <div class="">
        <!-- Header Section -->
        <div class="mb-10">
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 7a4 4 0 11-8 0 4 4 0 018 0zM6 20h12a1 1 0 001-1v-2a7 7 0 10-14 0v2a1 1 0 001 1z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Daftar Pengguna</h1>
                        <p class="text-gray-600 dark:text-gray-400 mt-1">Kelola dan lihat semua pengguna terdaftar sistem</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Section -->
        <div class="mb-8 bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-shadow">
            <div class="relative">
                <input wire:model.live="search" type="text"
                    placeholder="🔍 Cari berdasarkan nama, email, atau username, atau nomor..."
                    class="w-full pl-12 pr-6 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 transition-all" />
            </div>
        </div>

        <!-- Users Table Container -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-shadow">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gradient-to-r from-gray-100 to-gray-50 dark:from-gray-700 dark:to-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <tr>
                            <th class="px-6 py-4 text-left font-bold text-gray-900 dark:text-white cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors"
                                wire:click="sortBy('name')">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                    Nama
                                    @if ($sortBy === 'name')
                                        <svg class="w-4 h-4 transition-transform duration-200"
                                            :class="sortDirection === 'asc' ? 'rotate-0' : 'rotate-180'" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-bold text-gray-900 dark:text-white">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                    Email
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-bold text-gray-900 dark:text-white">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.3A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"></path>
                                    </svg>
                                    Username
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-bold text-gray-900 dark:text-white">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.79l.291 1.437a1 1 0 00.963.807h2.418a1 1 0 00.963-.807l.291-1.437A1 1 0 0110 2h2.153a1 1 0 011 1v2h4a1 1 0 011 1v2H1V4a1 1 0 011-1h4V3zM6.863 6.5a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0V7.25a.75.75 0 00-.75-.75zm4 0a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0V7.25a.75.75 0 00-.75-.75z"></path>
                                    </svg>
                                    Telepon
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-bold text-gray-900 dark:text-white cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors"
                                wire:click="sortBy('created_at')">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v2h16V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                    Bergabung
                                    @if ($sortBy === 'created_at')
                                        <svg class="w-4 h-4 transition-transform duration-200"
                                            :class="sortDirection === 'asc' ? 'rotate-0' : 'rotate-180'" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->users as $user)
                            <tr
                                class="{{ $loop->odd ? 'bg-white dark:bg-gray-800' : 'bg-gray-50 dark:bg-gray-900' }} border-b border-gray-200 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors duration-150">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <p class="font-semibold text-gray-900 dark:text-white">{{ $user->name }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 font-mono">ID: #{{ $user->id }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <button
                                        x-data="{ showEmail: false }"
                                        @click="showEmail = !showEmail"
                                        class="text-blue-600 dark:text-blue-400 hover:underline font-medium break-all hover:text-blue-800 dark:hover:text-blue-300 transition focus:outline-none"
                                        type="button"
                                    >
                                        <span x-show="!showEmail">Lihat Email</span>
                                        <span x-show="showEmail">
                                            {{ $user->email }}
                                        </span>
                                    </button>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1.5 bg-gradient-to-r from-blue-100 to-blue-50 dark:from-blue-900/40 dark:to-blue-900/20 text-blue-800 dark:text-blue-300 rounded-lg text-xs font-semibold border border-blue-200 dark:border-blue-800">
                                        {{ '@' . $user->username }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <button
                                        x-data="{ showPhone: false }"
                                        @click="showPhone = !showPhone"
                                        class="text-blue-600 dark:text-blue-400 hover:underline font-medium break-all hover:text-blue-800 dark:hover:text-blue-300 transition focus:outline-none"
                                        type="button"
                                    >
                                        @if($user->phone_number)
                                            <span x-show="!showPhone">Lihat Telepon</span>
                                            <span x-show="showPhone">
                                                {{ $user->phone_number }}
                                            </span>
                                        @else
                                            <span class="text-gray-400 dark:text-gray-600 italic">—</span>
                                        @endif
                                    </button>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-gray-700 dark:text-gray-300 font-medium">
                                        {{ $user->created_at->format('d M Y') }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-400 dark:text-gray-600 mb-4" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                        <p class="text-gray-600 dark:text-gray-400 font-semibold text-lg">Tidak ada pengguna ditemukan</p>
                                        <p class="text-gray-500 dark:text-gray-500 text-sm mt-1">Coba ubah kriteria pencarian Anda</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-gradient-to-r from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 border-t border-gray-200 dark:border-gray-700 px-6 py-6 flex items-center justify-center">
                <nav class="inline-flex gap-2 items-center pagination-wrapper">
                    @if ($this->users->onFirstPage())
                        <span class="px-4 py-2 rounded-xl bg-gray-200 dark:bg-gray-700 text-gray-400 dark:text-gray-500 cursor-not-allowed select-none flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Prev
                        </span>
                    @else
                        <button wire:click="setPage({{ $this->users->currentPage() - 1 }})" class="px-4 py-2 rounded-xl bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold hover:scale-105 transition flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Prev
                        </button>
                    @endif

                    @foreach ($this->users->getUrlRange(1, $this->users->lastPage()) as $page => $url)
                        @if ($page == $this->users->currentPage())
                            <span class="px-4 py-2 rounded-xl bg-blue-600 text-white font-bold shadow-lg scale-105">{{ $page }}</span>
                        @elseif ($page == 1 || $page == $this->users->lastPage() || ($page >= $this->users->currentPage() - 1 && $page <= $this->users->currentPage() + 1))
                            <button wire:click="setPage({{ $page }})" class="px-4 py-2 rounded-xl bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white font-semibold hover:bg-blue-100 dark:hover:bg-blue-900/20 hover:scale-105 transition">{{ $page }}</button>
                        @elseif ($page == $this->users->currentPage() - 2 || $page == $this->users->currentPage() + 2)
                            <span class="px-2 py-2 text-gray-400 dark:text-gray-500 select-none">...</span>
                        @endif
                    @endforeach

                    @if ($this->users->hasMorePages())
                        <button wire:click="setPage({{ $this->users->currentPage() + 1 }})" class="px-4 py-2 rounded-xl bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold hover:scale-105 transition flex items-center gap-1">
                            Next
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    @else
                        <span class="px-4 py-2 rounded-xl bg-gray-200 dark:bg-gray-700 text-gray-400 dark:text-gray-500 cursor-not-allowed select-none flex items-center gap-1">
                            Next
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    @endif
                </nav>
            </div>
        </div>
    </div>
</div>
