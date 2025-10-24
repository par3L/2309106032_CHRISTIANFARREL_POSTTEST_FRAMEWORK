@props(['category'])

@php
    $icons = [
        'Programming & Tech' => 'code',
        'Graphics & Design' => 'palette', 
        'Digital Marketing' => 'phone_android',
        'Writing & Translation' => 'edit',
        'Video & Animation' => 'movie',
        'Music & Audio' => 'music_note',
    ];
@endphp

<span class="material-icons text-3xl text-rose-800">
    {{ $icons[$category->name] ?? 'folder' }}
</span>