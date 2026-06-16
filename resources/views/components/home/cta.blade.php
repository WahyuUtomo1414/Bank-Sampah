<section class="section-space">
    <div class="page-shell">
        <div class="relative panel overflow-hidden bg-[var(--color-primary)] p-12 text-white md:p-20">
            <div class="relative z-10 flex flex-col items-center text-center">
                <span class="eyebrow bg-white/20 text-white">Langkah Kecil</span>
                <h2 class="mt-8 font-display text-3xl font-black leading-tight md:text-5xl lg:text-6xl">
                    Mulai Pilah Dari Sekarang.
                </h2>
                <p class="mt-8 max-w-2xl text-lg leading-relaxed text-white/70 md:text-xl">
                    Bergabunglah dengan ratusan warga lainnya yang telah berkontribusi bagi lingkungan dan mendapatkan nilai ekonomi tambahan.
                </p>
                <div class="mt-12 flex flex-col gap-4 sm:flex-row">
                    <a href="{{ route('contact') }}" class="btn-primary bg-white text-[var(--color-primary)] hover:bg-[var(--color-surface-container)] hover:text-[var(--color-primary-dark)]">
                        Daftar Jadi Warga
                    </a>
                    <a href="{{ route('about') }}" class="btn-ghost border-white/30 bg-transparent text-white hover:border-white hover:text-white">
                        Pelajari Selengkapnya
                    </a>
                </div>
            </div>
            {{-- Abstract Shapes --}}
            <div class="absolute -right-20 -top-20 size-96 rounded-full bg-white/5 blur-3xl"></div>
            <div class="absolute -bottom-20 -left-20 size-96 rounded-full bg-black/5 blur-3xl"></div>
        </div>
    </div>
</section>