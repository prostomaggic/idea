@props(['status' => 'pending'])
@php
    $classes = 'inline-block rounded-full border px-2 py-1 text-xs font-medium';

    if ($status === 'completed') {
        $classes .= ' bg-yellow-200/80 text-yellow-900 border-yellow-500/20';
    }

    if ($status === 'in_progress') {
        $classes .= ' bg-blue-200/80 text-blue-900 border-blue-500/20';
    }

    if ($status === 'pending') {
        $classes .= ' bg-taupe-200/80 text-taupe-900 border-taupe-500/20';
    }

@endphp

<div class="items-align-top"><span {{ $attributes(['class' => $classes]) }}>{{ $slot }}</span>
</div>