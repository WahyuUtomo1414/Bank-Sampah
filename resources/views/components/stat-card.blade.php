@props([
    'label',
    'value',
    'description' => null,
])

<article class="panel p-6">
    <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[var(--color-muted)]">{{ $label }}</p>
    <p class="mt-3 font-display text-3xl font-extrabold text-[var(--color-primary-dark)] md:text-4xl">{{ $value }}</p>
    @if ($description)
        <p class="mt-3 text-sm leading-6 text-[var(--color-muted)]">{{ $description }}</p>
    @endif
</article>
