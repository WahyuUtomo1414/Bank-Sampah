@props([
    'label',
    'value',
    'description' => null,
])

<article class="panel panel-hover flex flex-col justify-between p-8">
    <div>
        <div class="inline-flex size-10 items-center justify-center rounded-xl bg-[var(--color-surface-container)] text-[var(--color-primary)]">
            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
            </svg>
        </div>
        <p class="mt-6 text-sm font-bold uppercase tracking-widest text-[var(--color-ink-muted)]">{{ $label }}</p>
        <p class="mt-2 font-display text-4xl font-black text-[var(--color-primary)]">{{ $value }}</p>
    </div>
    @if ($description)
        <p class="mt-4 text-xs font-medium leading-relaxed text-[var(--color-ink-muted)]">{{ $description }}</p>
    @endif
</article>
