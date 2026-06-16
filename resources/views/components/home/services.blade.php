@props(['services'])

<section class="section-space bg-[var(--color-surface-container-low)]/50">
    <div class="page-shell">
        <div class="flex flex-col items-center text-center">
            <x-common.section-header
                align="center"
                eyebrow="Layanan Unggulan"
                title="Kami menangani sampah Anda dengan cara yang lebih baik."
                description="Bank Sampah fokus pada kemudahan warga. Seluruh proses teknis dilakukan oleh admin profesional kami."
            />
        </div>

        <div class="mt-16 grid grid-cols-1 gap-8 md:grid-cols-3">
            @foreach ($services as $service)
                <div class="group panel panel-hover p-10">
                    <div class="flex size-14 items-center justify-center rounded-2xl bg-[var(--color-surface-container)] text-[var(--color-primary)] transition-colors group-hover:bg-[var(--color-primary)] group-hover:text-white">
                        <svg class="size-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if($service['icon'] === 'scale')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            @elseif($service['icon'] === 'banknotes')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            @endif
                        </svg>
                    </div>
                    <h3 class="mt-8 font-display text-2xl font-bold text-[var(--color-ink)]">{{ $service['title'] }}</h3>
                    <p class="mt-4 text-base leading-relaxed text-[var(--color-ink-muted)]">{{ $service['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>