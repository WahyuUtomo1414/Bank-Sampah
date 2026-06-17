@props(['hero'])

<section class="relative isolate overflow-hidden pb-20 pt-10 md:pb-28 lg:pt-20">
    <div class="absolute inset-0 -z-20 bg-[radial-gradient(circle_at_top_left,rgba(76,175,80,0.18),transparent_34%),radial-gradient(circle_at_right,rgba(139,195,74,0.14),transparent_28%),linear-gradient(180deg,#f7fbf7_0%,#f2f8f2_100%)]"></div>
    <div class="absolute inset-x-0 top-0 -z-10 h-[32rem] soft-grid opacity-60 [mask-image:linear-gradient(to_bottom,white,transparent)]"></div>

    <div class="page-shell">
        <div class="max-w-4xl">
            <div class="relative z-10">
                <span class="eyebrow">{{ $hero['eyebrow'] }}</span>
                <h1 class="mt-6 max-w-3xl font-display text-4xl font-extrabold leading-[1.05] tracking-[-0.03em] text-[var(--color-ink)] sm:text-5xl md:text-6xl lg:text-7xl">
                    {{ $hero['title'] }}
                </h1>
                <p class="mt-6 max-w-2xl text-base leading-7 text-[var(--color-ink-muted)] md:text-lg md:leading-8">
                    {{ $hero['description'] }}
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
                    <a href="{{ $hero['primaryCta']['href'] }}" class="btn-primary group px-7">
                        {{ $hero['primaryCta']['label'] }}
                        <svg class="ml-2 size-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                    <a href="{{ $hero['secondaryCta']['href'] }}" class="btn-ghost px-7">
                        {{ $hero['secondaryCta']['label'] }}
                    </a>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-3 sm:grid-cols-3">
                    @foreach ($hero['highlights'] as $highlight)
                        <div class="glass-panel flex items-start gap-3 px-4 py-4">
                            <div class="mt-0.5 flex size-8 shrink-0 items-center justify-center rounded-full bg-[var(--color-primary)]/10 text-[var(--color-primary)]">
                                <svg class="size-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <p class="text-sm font-semibold leading-6 text-[var(--color-ink)]">{{ $highlight }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
