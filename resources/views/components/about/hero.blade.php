@props(['hero'])

<section class="relative isolate overflow-hidden bg-[var(--color-surface)] pb-24 pt-16 sm:pb-32 lg:pt-32">
    {{-- Background Elements --}}
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <svg class="absolute left-[max(50%,25rem)] top-0 h-[64rem] w-[128rem] -translate-x-1/2 stroke-[var(--color-outline-variant)] [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)]" aria-hidden="true">
            <defs>
                <pattern id="about-grid" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                    <path d="M100 200V.5M.5 .5H200" fill="none" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#about-grid)" />
        </svg>
    </div>

    <div class="page-shell">
        <div class="mx-auto max-w-4xl text-center">
            <div class="inline-flex items-center gap-2 rounded-full border border-[var(--color-primary)]/20 bg-[var(--color-primary)]/5 px-4 py-1.5 text-sm font-bold text-[var(--color-primary)]">
                {{ $hero['eyebrow'] }}
            </div>
            
            <h1 class="mt-8 font-display text-4xl font-black tracking-tight text-[var(--color-ink)] sm:text-6xl lg:text-7xl">
                {{ $hero['title'] }}
            </h1>
            
            <p class="mt-8 text-lg leading-8 text-[var(--color-ink-muted)] sm:text-xl">
                {{ $hero['description'] }}
            </p>
        </div>
    </div>
</section>
