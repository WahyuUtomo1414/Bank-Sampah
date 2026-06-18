@props(['locations'])

@if(count($locations) > 0)
<section class="section-space">
    <div class="page-shell">
        <x-common.section-header
            align="center"
            eyebrow="Jaringan Kami"
            title="Lokasi Bank Sampah"
            description="Temukan titik layanan Bank Sampah terdekat dari rumah Anda untuk mempermudah proses penyetoran sampah terpilah."
        />

        <div class="mt-16 grid grid-cols-1 gap-8 md:grid-cols-2">
            @foreach ($locations as $location)
                <div class="panel group overflow-hidden panel-hover">
                    <div class="aspect-video w-full overflow-hidden bg-[var(--color-surface-container)] grayscale transition-all duration-500 group-hover:grayscale-0">
                        @if ($location['googleMapsEmbedUrl'])
                            <iframe
                                src="{{ $location['googleMapsEmbedUrl'] }}"
                                class="h-full w-full border-0"
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                allowfullscreen
                            ></iframe>
                        @else
                            <div class="flex h-full w-full items-center justify-center bg-[linear-gradient(135deg,rgba(47,125,50,0.14),rgba(139,195,74,0.08))] text-center">
                                <div class="max-w-xs px-6">
                                    <div class="mx-auto flex size-16 items-center justify-center rounded-2xl bg-white/85 text-[var(--color-primary)] shadow-sm">
                                        <svg class="size-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    </div>
                                    <p class="mt-5 text-sm font-bold uppercase tracking-[0.22em] text-[var(--color-ink-muted)]">Preview Google Maps</p>
                                    <p class="mt-3 text-sm leading-7 text-[var(--color-ink-muted)]">
                                        Link lokasi tersedia, tapi formatnya bukan link embed. Gunakan tombol di bawah untuk membuka peta langsung.
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="p-8 lg:p-10">
                        <div class="flex items-start justify-between gap-6">
                            <div>
                                <div class="inline-flex items-center gap-2 rounded-full bg-[var(--color-primary)]/10 px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-[var(--color-primary)]">
                                    <span class="size-1.5 rounded-full bg-[var(--color-primary)] animate-pulse"></span>
                                    Titik Layanan Aktif
                                </div>
                                <h3 class="mt-4 font-display text-2xl font-black text-[var(--color-ink)] lg:text-3xl">{{ $location['nama'] }}</h3>
                                <p class="mt-3 text-sm leading-relaxed text-[var(--color-ink-muted)]">
                                    Layanan setor sampah dan tarik saldo tersedia di lokasi ini sesuai jadwal operasional yang berlaku.
                                </p>
                                @if ($location['googleMapsUrl'])
                                    <a
                                        href="{{ $location['googleMapsUrl'] }}"
                                        target="_blank"
                                        rel="noreferrer"
                                        class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-[var(--color-primary)] hover:underline"
                                    >
                                        Buka di Google Maps
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5h5m0 0v5m0-5L10 14"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 9v10h10"/></svg>
                                    </a>
                                @endif
                            </div>
                            <div class="flex size-14 shrink-0 items-center justify-center rounded-2xl bg-[var(--color-surface-container)] text-[var(--color-primary)] transition-colors group-hover:bg-[var(--color-primary)] group-hover:text-white">
                                <svg class="size-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
