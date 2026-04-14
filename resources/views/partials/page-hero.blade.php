@php
    $title = $title ?? '';
    $subtitle = $subtitle ?? '';
    $image = $image ?? null;
    $imagePosition = $imagePosition ?? 'center';
    $imageScale = $imageScale ?? 1;
@endphp

<div class="relative pt-24 pb-12 overflow-hidden">
    @if ($image)
        <img src="{{ $image }}" alt="" class="absolute inset-0 h-full w-full object-cover" style="object-position: {{ $imagePosition }}; transform: scale({{ $imageScale }});" onerror="this.remove()">
        <div class="absolute inset-0 bg-gradient-to-b from-black/65 via-black/40 to-black/65"></div>
    @else
        <div class="absolute inset-0 bg-gradient-to-br from-green-700 via-emerald-600 to-lime-500"></div>
        <div class="absolute inset-0 bg-black/25"></div>
    @endif

    <div class="container mx-auto px-6 text-white text-center relative">
            <h2 class="text-4xl md:text-5xl font-extrabold mb-3 drop-shadow-[0_2px_14px_rgba(0,0,0,0.65)]">{{ $title }}</h2>
            <p class="text-white/90 text-lg md:text-xl font-semibold drop-shadow-[0_2px_10px_rgba(0,0,0,0.55)]">{{ $subtitle }}</p>
            <div class="w-24 h-1 bg-white mx-auto rounded-full mt-4"></div>
        </div>
    </div>
</div>