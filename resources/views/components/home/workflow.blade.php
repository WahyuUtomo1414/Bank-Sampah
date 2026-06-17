@props(['workflow'])

<section class="section-space overflow-hidden">
    <div class="page-shell">
        <div class="grid grid-cols-1 gap-10 rounded-[2rem] border border-[var(--color-outline-variant)]/60 bg-white/45 p-6 backdrop-blur-[2px] lg:grid-cols-[0.95fr_1.05fr] lg:items-center lg:gap-14 lg:p-10">
            <div class="order-2 lg:order-1">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    @foreach ($workflow as $index => $step)
                        <div class="section-card p-6 {{ $index % 2 !== 0 ? 'lg:translate-y-8' : '' }}">
                            <div class="flex items-center justify-between gap-4">
                                <span class="font-display text-5xl font-black text-[var(--color-surface-container-highest)]">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <span class="rounded-full bg-[var(--color-primary-soft)] px-3 py-1 text-[11px] font-bold uppercase tracking-[0.18em] text-[var(--color-primary)]">Tahap</span>
                            </div>
                            <p class="mt-5 text-sm font-semibold leading-7 text-[var(--color-ink)]">{{ $step }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="order-1 lg:order-2 lg:pl-4">
                <x-common.section-header
                    eyebrow="Alur Kerja"
                    title="Proses sederhana, dampak luar biasa."
                    description="Kami merancang alur yang memudahkan warga tanpa harus repot dengan urusan administrasi yang rumit."
                />
                <div class="mt-8 rounded-[1.75rem] border border-[var(--color-outline-variant)] bg-[var(--color-primary-soft)] p-5">
                    <p class="text-sm leading-7 text-[var(--color-ink-muted)]">Setiap langkah dibuat singkat, jelas, dan bisa diikuti warga tanpa perlu aplikasi rumit. Admin tetap memegang proses verifikasi agar pencatatan konsisten.</p>
                </div>
                <div class="mt-8">
                    <a href="{{ route('contact') }}" class="btn-primary">Tanya Detail Alur</a>
                </div>
            </div>
        </div>
    </div>
</section>
