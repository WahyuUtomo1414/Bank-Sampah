@props(['articles'])

<section class="section-space">
    <div class="page-shell">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-[0.8fr_1.2fr]">
            <div>
                <x-common.section-header
                    eyebrow="Edukasi"
                    title="Wawasan Lingkungan untuk Warga."
                    description="Kami percaya bahwa perubahan besar dimulai dari pengetahuan yang tepat."
                />
                <div class="mt-8">
                    <a href="{{ route('articles') }}" class="inline-flex items-center gap-2 font-bold text-[var(--color-primary)] hover:underline">
                        Lihat Semua Artikel
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                @foreach ($articles as $article)
                    <article class="panel panel-hover group overflow-hidden">
                        <div class="aspect-video bg-[var(--color-surface-container)] transition-transform duration-500 group-hover:scale-105"></div>
                        <div class="p-8">
                            <p class="text-[10px] font-bold uppercase tracking-widest text-[var(--color-ink-muted)]">{{ $article['date'] }}</p>
                            <h3 class="mt-4 font-display text-xl font-bold leading-tight text-[var(--color-ink)]">{{ $article['title'] }}</h3>
                            <p class="mt-4 text-sm leading-relaxed text-[var(--color-ink-muted)]">{{ $article['excerpt'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>