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
                        {!! $location['google_maps'] !!}
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
