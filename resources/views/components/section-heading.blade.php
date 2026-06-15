@props([
    'eyebrow' => null,
    'title',
    'description' => null,
    'align' => 'left',
])

<div class="{{ $align === 'center' ? 'mx-auto max-w-3xl text-center' : 'max-w-3xl' }}">
    @if ($eyebrow)
        <span class="eyebrow">{{ $eyebrow }}</span>
    @endif

    <h2 class="mt-4 text-3xl font-bold leading-tight text-[var(--color-ink)] md:text-4xl">
        {{ $title }}
    </h2>

    @if ($description)
        <p class="mt-4 text-base leading-7 text-[var(--color-muted)] md:text-lg">
            {{ $description }}
        </p>
    @endif
</div>
