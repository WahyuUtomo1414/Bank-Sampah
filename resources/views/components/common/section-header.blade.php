@props([
    'eyebrow' => null,
    'title',
    'description' => null,
    'align' => 'left',
])

<div class="{{ $align === 'center' ? 'mx-auto max-w-3xl text-center' : 'max-w-3xl' }}">
    @if ($eyebrow)
        <span class="eyebrow mb-6">{{ $eyebrow }}</span>
    @endif

    <h2 class="font-display text-3xl font-extrabold tracking-tight text-[var(--color-ink)] md:text-4xl lg:text-5xl lg:leading-[1.15]">
        {{ $title }}
    </h2>

    @if ($description)
        <p class="mt-6 text-base leading-relaxed text-[var(--color-ink-muted)] md:text-lg">
            {{ $description }}
        </p>
    @endif
</div>
