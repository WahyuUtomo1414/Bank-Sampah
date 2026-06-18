@props(['articles'])

<section class="soft-band section-space">
    <div class="page-shell">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-[0.72fr_1.28fr] lg:gap-10">
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
                <p class="mt-8 text-xs font-bold uppercase tracking-[0.22em] text-[var(--color-ink-muted)]">
                    Geser ke samping untuk baca pilihan artikel
                </p>
            </div>
            <div class="scroll-strip flex gap-4 overflow-x-auto pb-4">
                @forelse ($articles as $article)
                    <article class="group min-w-[85%] overflow-hidden rounded-[1.75rem] border border-[var(--color-outline-variant)] bg-white shadow-[var(--shadow-soft)] transition-all duration-300 sm:min-w-[24rem] lg:min-w-[26rem]">
                        <div class="relative aspect-[16/10] overflow-hidden bg-[linear-gradient(135deg,rgba(47,125,50,0.18),rgba(139,195,74,0.12))]">
                            @if ($article['hasImage'])
                                <img src="{{ $article['imageUrl'] }}" alt="{{ $article['title'] }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <div class="absolute inset-0 bg-[linear-gradient(180deg,rgba(22,48,27,0.02),rgba(22,48,27,0.32))]"></div>
                            @else
                                <div class="flex h-full w-full items-center justify-center">
                                    <x-common.trash-icon class="size-20 text-[var(--color-primary)]/20" />
                                </div>
                            @endif
                            <div class="absolute inset-0 soft-grid opacity-40"></div>
                            <div class="absolute inset-x-6 bottom-6 rounded-2xl bg-white/88 px-4 py-3 backdrop-blur-sm">
                                <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[var(--color-ink-muted)]">{{ $article['date'] }}</p>
                                <p class="mt-2 text-sm font-semibold text-[var(--color-primary)]">{{ $article['category'] }}</p>
                            </div>
                        </div>
                        <div class="p-6 md:p-7">
                            <h3 class="font-display text-xl font-bold leading-tight text-[var(--color-ink)]">{{ $article['title'] }}</h3>
                            <p class="mt-4 text-sm leading-7 text-[var(--color-ink-muted)]">{{ $article['excerpt'] }}</p>
                            <div class="mt-5 text-sm font-semibold text-[var(--color-primary-dark)]">
                                {{ $article['readTime'] }}
                            </div>
                            <div class="mt-6">
                                <a href="{{ route('articles.show', $article['slug']) }}" class="inline-flex items-center gap-2 text-sm font-bold text-[var(--color-primary)]">
                                    Baca ringkasan
                                    <svg class="size-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="min-w-full rounded-[1.75rem] border border-dashed border-[var(--color-outline-variant)] bg-white/70 p-6 text-sm leading-7 text-[var(--color-ink-muted)]">
                        Artikel belum tersedia. Konten edukasi akan tampil di sini setelah data artikel diisi.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
