@php
    $getBorderColor = function($status) {
        return match($status) {
            'pending' => 'border-l-yellow-500',
            'ongoing' => 'border-l-blue-500',
            'completed' => 'border-l-green-500',
            'cancelled' => 'border-l-red-500',
            default => 'border-l-gray-500',
        };
    };

    $getStatusBadgeClass = function($status) {
        return match($status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'ongoing' => 'bg-blue-100 text-blue-800',
            'completed' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    };
@endphp

@extends('layouts.timeline')

@section('title', 'Timeline Komunitas Baricode')

@section('content')
<div class="m-6 p-3">

        <!-- Filter Buttons -->
        <div class="mb-8 flex flex-wrap gap-3">
            <a href="{{ route('timelines.index') }}"
                class="px-4 py-2 rounded-lg font-medium transition {{ request('status') === null ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-800 hover:bg-gray-300' }}">
                Semua
            </a>
            <a href="{{ route('timelines.index', ['status' => 'pending']) }}"
                class="px-4 py-2 rounded-lg font-medium transition {{ request('status') === 'pending' ? 'bg-yellow-600 text-white' : 'bg-gray-200 text-gray-800 hover:bg-gray-300' }}">
                Tertunda
            </a>
            <a href="{{ route('timelines.index', ['status' => 'ongoing']) }}"
                class="px-4 py-2 rounded-lg font-medium transition {{ request('status') === 'ongoing' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800 hover:bg-gray-300' }}">
                Berlangsung
            </a>
            <a href="{{ route('timelines.index', ['status' => 'completed']) }}"
                class="px-4 py-2 rounded-lg font-medium transition {{ request('status') === 'completed' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-800 hover:bg-gray-300' }}">
                Selesai
            </a>
            <a href="{{ route('timelines.index', ['status' => 'cancelled']) }}"
                class="px-4 py-2 rounded-lg font-medium transition {{ request('status') === 'cancelled' ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-800 hover:bg-gray-300' }}">
                Dibatalkan
            </a>
        </div>

        <!-- Timeline List -->
        @if($timelines->isNotEmpty())
            <div class="space-y-6">
                @foreach($timelines as $timeline)
                    <a href="{{ route('timelines.show', $timeline) }}"
                        class="block bg-white rounded-lg shadow-md hover:shadow-lg transition overflow-hidden {{ $getBorderColor($timeline->status) }} border-l-4 hover:scale-105 transform">
                        <div class="p-6">
                            <!-- Title and Status -->
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <h2 class="text-2xl font-bold text-gray-900 mb-1 hover:text-blue-600">{{ $timeline->title }}</h2>
                                    <span class="inline-block px-3 py-1 rounded-full text-sm font-medium {{ $getStatusBadgeClass($timeline->status) }}">
                                        {{ $timeline->status_label }}
                                    </span>
                                </div>
                            </div>

                            <!-- Description -->
                            @if($timeline->description)
                                <p class="text-gray-700 mb-4 leading-relaxed line-clamp-2">{{ $timeline->description }}</p>
                            @endif

                            <!-- Progress Bar -->
                            <div class="mb-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-gray-600">Progress</span>
                                    <span class="text-sm font-bold text-gray-900">{{ $timeline->progress }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3">
                                    <div class="bg-blue-600 h-3 rounded-full transition-all"
                                        style="width: {{ $timeline->progress }}%">
                                    </div>
                                </div>
                            </div>

                            <!-- Dates -->
                            <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                @if($timeline->start_date)
                                    <div>
                                        <span class="text-gray-600">Tanggal Mulai:</span>
                                        <p class="font-medium text-gray-900">{{ $timeline->start_date->format('d M Y') }}</p>
                                    </div>
                                @endif
                                @if($timeline->end_date)
                                    <div>
                                        <span class="text-gray-600">Tanggal Selesai:</span>
                                        <p class="font-medium text-gray-900">{{ $timeline->end_date->format('d M Y') }}</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Footer -->
                            <div class="flex justify-between items-center text-xs text-gray-500 pt-4 border-t">
                                <span>Dibuat: {{ $timeline->created_at->format('d M Y H:i') }}</span>
                                <span class="text-blue-600 font-medium hover:text-blue-800">Lihat Detail →</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $timelines->render() }}
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mt-4">Tidak Ada Timeline</h3>
                <p class="text-gray-600 mt-1">Belum ada timeline komunitas yang tersedia.</p>
            </div>
        @endif
</div>
@endsection
