@props([
    'status' => 'pending',
    'label' => 'Tertunda',
])

@php
    $statusStyles = match($status) {
        'pending' => 'bg-yellow-500/20 text-yellow-300 border-yellow-500/30',
        'ongoing' => 'bg-blue-500/20 text-blue-300 border-blue-500/30',
        'completed' => 'bg-green-500/20 text-green-300 border-green-500/30',
        'cancelled' => 'bg-red-500/20 text-red-300 border-red-500/30',
        default => 'bg-purple-500/20 text-purple-300 border-purple-500/30',
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center px-3 py-1 rounded-full text-sm font-medium border {$statusStyles}"]) }}>
    {{ $label }}
</span>
