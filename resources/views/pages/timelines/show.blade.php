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

@section('title', $timeline->title)

@section('content')
<div class="container py-12">
    <div class="max-w-4xl mx-auto">
        <!-- Back Button -->
        <a href="{{ route('timelines.index') }}"
            class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-8 font-medium">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Timeline
        </a>

        <!-- Main Card -->
        <div class="bg-white rounded-lg shadow-lg p-8 border-l-4 {{ $getBorderColor($timeline->status) }}">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900 mb-3">{{ $timeline->title }}</h1>
                        <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold {{ $getStatusBadgeClass($timeline->status) }}">
                            {{ $timeline->status_label }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Description -->
            @if($timeline->description)
                <div class="mb-8 pb-8 border-b">
                    <h2 class="text-xl font-bold text-gray-900 mb-3">Deskripsi</h2>
                    <p class="text-gray-700 text-lg leading-relaxed">{{ $timeline->description }}</p>
                </div>
            @endif

            <!-- Progress Section -->
            <div class="mb-8 pb-8 border-b">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Progress</h2>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 font-medium">Persentase Penyelesaian:</span>
                        <span class="text-2xl font-bold text-blue-600">{{ $timeline->progress }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-4 rounded-full transition-all"
                            style="width: {{ $timeline->progress }}%">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Timeline Details -->
            <div class="mb-8 pb-8 border-b">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Detail Timeline</h2>
                <div class="grid grid-cols-2 gap-6">
                    @if($timeline->start_date)
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-600 text-sm mb-1">Tanggal Mulai</p>
                            <p class="text-gray-900 font-semibold text-lg">{{ $timeline->start_date->format('d M Y') }}</p>
                            <p class="text-gray-500 text-xs mt-1">
                                Kurang lebih {{ $timeline->start_date->diffForHumans(now(), true) }} yang lalu
                            </p>
                        </div>
                    @endif

                    @if($timeline->end_date)
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-600 text-sm mb-1">Tanggal Selesai</p>
                            <p class="text-gray-900 font-semibold text-lg">{{ $timeline->end_date->format('d M Y') }}</p>
                            <p class="text-gray-500 text-xs mt-1">
                                {{ $timeline->end_date > now() ? $timeline->end_date->diffForHumans(now()) : 'Sudah berakhir' }}
                            </p>
                        </div>
                    @endif
                </div>

                @if($timeline->start_date && $timeline->end_date)
                    <div class="mt-4 bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                        <p class="text-blue-900 text-sm">
                            <span class="font-semibold">Durasi:</span>
                            {{ $timeline->start_date->diffInDays($timeline->end_date) }} hari
                        </p>
                    </div>
                @endif
            </div>

            <!-- Notes -->
            @if($timeline->notes)
                <div class="mb-8 pb-8 border-b">
                    <h2 class="text-xl font-bold text-gray-900 mb-3">Catatan Tambahan</h2>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                        <p class="text-gray-700 whitespace-pre-line">{{ $timeline->notes }}</p>
                    </div>
                </div>
            @endif

            <!-- Metadata -->
            <div class="text-sm text-gray-500">
                <p class="mb-2">
                    <span class="font-semibold">Dibuat:</span>
                    {{ $timeline->created_at->format('d M Y H:i') }}
                    ({{ $timeline->created_at->diffForHumans(now()) }})
                </p>
                @if($timeline->updated_at->ne($timeline->created_at))
                    <p>
                        <span class="font-semibold">Terakhir Diperbarui:</span>
                        {{ $timeline->updated_at->format('d M Y H:i') }}
                        ({{ $timeline->updated_at->diffForHumans(now()) }})
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
