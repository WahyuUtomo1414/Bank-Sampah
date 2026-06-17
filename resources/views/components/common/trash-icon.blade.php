@props([
    'class' => 'size-14',
])

<svg {{ $attributes->merge(['class' => $class]) }} fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M7 7h10m-9 0 1 12h6l1-12m-6-3h4a1 1 0 0 1 1 1v2H9V5a1 1 0 0 1 1-1z"/>
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M10 10v6m4-6v6"/>
</svg>
