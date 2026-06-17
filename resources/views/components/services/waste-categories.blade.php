@props(['acceptedWaste'])

<section class="section-space">
    <div class="page-shell">
        <x-common.section-header
            align="center"
            eyebrow="Edukasi Sampah"
            title="Kategori Sampah Terpilah"
            description="Mengenal jenis sampah yang kami terima untuk memudahkan Anda dalam proses pemilahan di rumah."
        />

        <div class="mt-16 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($acceptedWaste as $item)
                <div class="panel flex items-center gap-6 p-6">
                    <div class="flex size-14 items-center justify-center rounded-2xl bg-[var(--color-surface-container)] text-[var(--color-primary)]">
                        <svg class="size-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-display text-lg font-bold text-[var(--color-ink)]">{{ $item }}</h4>
                        <p class="text-xs font-bold uppercase tracking-widest text-[var(--color-ink-muted)]">Kategori Terpilih</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
