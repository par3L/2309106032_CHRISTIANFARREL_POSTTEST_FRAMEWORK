@props(['category'])

@php
    $icons = [
        'Programming & Tech' => '💻',
        'Graphics & Design' => '🎨', 
        'Digital Marketing' => '📱',
        'Writing & Translation' => '✍️',
        'Video & Animation' => '🎬',
        'Music & Audio' => '🎵',
    ];
@endphp

<span class="text-xl">
    {{ $icons[$category->name] ?? '📋' }}
</span>