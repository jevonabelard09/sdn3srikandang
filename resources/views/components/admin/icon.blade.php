@props([
    'name',
    'class' => 'w-5 h-5',
])

@php
    $attrs = $attributes->merge([
        'xmlns' => 'http://www.w3.org/2000/svg',
        'viewBox' => '0 0 24 24',
        'fill' => 'none',
        'stroke' => 'currentColor',
        'stroke-width' => '2',
        'stroke-linecap' => 'round',
        'stroke-linejoin' => 'round',
        'class' => $class,
        'aria-hidden' => 'true',
    ]);
@endphp

@switch($name)
    @case('dashboard')
        <svg {{ $attrs }}>
            <path d="M3 13h8V3H3v10z"></path>
            <path d="M13 21h8V11h-8v10z"></path>
            <path d="M13 3h8v6h-8V3z"></path>
            <path d="M3 17h8v4H3v-4z"></path>
        </svg>
        @break

    @case('gallery')
        <svg {{ $attrs }}>
            <path d="M21 19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14z"></path>
            <path d="M9 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"></path>
            <path d="M21 15l-5-5L5 21"></path>
        </svg>
        @break

    @case('trophy')
        <svg {{ $attrs }}>
            <path d="M8 21h8"></path>
            <path d="M12 17v4"></path>
            <path d="M7 4h10v4a5 5 0 0 1-10 0V4z"></path>
            <path d="M7 6H5a2 2 0 0 0 0 4h2"></path>
            <path d="M17 6h2a2 2 0 1 1 0 4h-2"></path>
        </svg>
        @break

    @case('program')
        <svg {{ $attrs }}>
            <path d="M4 19a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12z"></path>
            <path d="M8 3v4"></path>
            <path d="M16 3v4"></path>
            <path d="M4 11h16"></path>
        </svg>
        @break

    @case('teachers')
        <svg {{ $attrs }}>
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
            <path d="M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"></path>
            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
        </svg>
        @break


    @case('contact')
        <svg {{ $attrs }}>
            <path d="M4 4h16v16H4z"></path>
            <path d="m22 6-10 7L2 6"></path>
        </svg>
        @break

    @case('account')
        <svg {{ $attrs }}>
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <path d="M12 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"></path>
        </svg>
        @break

    @case('external')
        <svg {{ $attrs }}>
            <path d="M14 3h7v7"></path>
            <path d="M10 14L21 3"></path>
            <path d="M21 14v6a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6"></path>
        </svg>
        @break

    @case('logout')
        <svg {{ $attrs }}>
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
            <path d="M16 17l5-5-5-5"></path>
            <path d="M21 12H9"></path>
        </svg>
        @break

    @default
        <svg {{ $attrs }}>
            <path d="M12 3v18"></path>
            <path d="M3 12h18"></path>
        </svg>
@endswitch
