@props(['workflow'])

<section class="section-space overflow-hidden">
    <div class="page-shell">
        <div class="grid grid-cols-1 gap-16 lg:grid-cols-2 lg:items-center">
            <div class="order-2 lg:order-1">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    @foreach ($workflow as $index => $step)
                        <div class="panel p-8 {{ $index % 2 !== 0 ? 'lg:translate-y-8' : '' }}">
                            <span class="font-display text-5xl font-black text-[var(--color-surface-container-highest)]">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <p class="mt-4 text-sm font-bold leading-relaxed text-[var(--color-ink)]">{{ $step }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="order-1 lg:order-2 lg:pl-10">
                <x-common.section-header
                    eyebrow="Alur Kerja"
                    title="Proses sederhana, dampak luar biasa."
                    description="Kami merancang alur yang memudahkan warga tanpa harus repot dengan urusan administrasi yang rumit."
                />
                <div class="mt-10">
                    <a href="{{ route('contact') }}" class="btn-primary">Tanya Detail Alur</a>
                </div>
            </div>
        </div>
    </div>
</section>