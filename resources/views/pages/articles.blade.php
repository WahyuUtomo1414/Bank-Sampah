@extends('layouts.public')

@section('title', 'Bank Sampah | Artikel')

@section('content')
    <section class="soft-band section-space">
        <div class="page-shell">
            <x-common.section-header :eyebrow="$hero['eyebrow']" :title="$hero['title']" :description="$hero['description']" />

            @if ($featuredArticle)
                <div class="mt-10 overflow-hidden rounded-[2rem] border border-[var(--color-outline-variant)] bg-white/85 shadow-[var(--shadow-soft)]">
                    <div class="grid grid-cols-1 lg:grid-cols-[1.15fr_0.85fr]">
                        <div class="relative overflow-hidden bg-[linear-gradient(135deg,rgba(223,243,226,0.9),rgba(247,251,247,1))] p-8 md:p-10 lg:p-12">
                            <div class="absolute inset-0 soft-grid opacity-45"></div>
                            <div class="relative">
                                <span class="inline-flex rounded-full bg-white/88 px-3 py-1 text-[11px] font-bold uppercase tracking-[0.2em] text-[var(--color-primary-dark)]">
                                    {{ $featuredArticle['category'] }}
                                </span>
                                <h2 class="mt-5 max-w-2xl font-display text-3xl font-bold leading-tight text-[var(--color-ink)] md:text-4xl lg:text-5xl">
                                    {{ $featuredArticle['title'] }}
                                </h2>
                                <p class="mt-5 max-w-2xl text-sm leading-7 text-[var(--color-ink-muted)] md:text-base">
                                    {{ $featuredArticle['excerpt'] }}
                                </p>
                                <div class="mt-8 flex flex-wrap items-center gap-4 text-sm font-semibold text-[var(--color-primary-dark)]">
                                    <span>{{ $featuredArticle['date'] }}</span>
                                    <span class="h-1 w-1 rounded-full bg-[var(--color-outline)]"></span>
                                    <span>{{ $featuredArticle['readTime'] }}</span>
                                </div>
                                <div class="mt-8">
                                    <a href="{{ route('articles.show', $featuredArticle['slug']) }}" class="btn-primary">
                                        Baca Artikel Utama
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between bg-white p-8 md:p-10">
                            <div>
                                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[var(--color-ink-muted)]">Topik Artikel</p>
                                <div class="mt-5 flex flex-wrap gap-3">
                                    @foreach ($categories as $category)
                                        <span class="inline-flex rounded-full bg-[var(--color-primary-soft)] px-4 py-2 text-sm font-semibold text-[var(--color-primary-dark)]">
                                            {{ $category }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-8 rounded-[1.5rem] border border-[var(--color-outline-variant)] bg-[var(--color-surface)] p-5">
                                <p class="font-display text-xl font-bold text-[var(--color-ink)]">Konten edukasi yang ringan dibaca warga.</p>
                                <p class="mt-3 text-sm leading-7 text-[var(--color-ink-muted)]">
                                    Artikel dipilih untuk membantu warga memahami pemilahan, setoran, dan kebiasaan lingkungan secara lebih praktis.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <section class="section-space pt-0">
        <div class="page-shell">
            <div class="mb-8 flex items-end justify-between gap-6">
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[var(--color-ink-muted)]">Daftar Artikel</p>
                    <h2 class="mt-2 font-display text-3xl font-bold text-[var(--color-ink)]">Artikel terbaru untuk warga.</h2>
                </div>
                <p class="hidden text-sm leading-7 text-[var(--color-ink-muted)] lg:block">Pilih artikel yang paling relevan untuk dibaca lebih dulu.</p>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($articles as $article)
                    <article class="group overflow-hidden rounded-[1.75rem] border border-[var(--color-outline-variant)] bg-white shadow-[var(--shadow-soft)] transition-all duration-300 hover:-translate-y-1 hover:shadow-[var(--shadow-lift)]">
                        <div class="relative h-44 overflow-hidden bg-[linear-gradient(135deg,#f2f8f2_0%,#dff0e1_100%)]">
                            <div class="absolute inset-0 soft-grid opacity-45"></div>
                            <div class="absolute inset-x-6 bottom-6">
                                <span class="inline-flex rounded-full bg-white/90 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.18em] text-[var(--color-primary-dark)]">
                                    {{ $article['category'] }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="mt-4 font-display text-2xl font-bold leading-snug text-[var(--color-ink)]">
                                {{ $article['title'] }}
                            </h3>
                            <p class="mt-3 text-sm leading-7 text-[var(--color-ink-muted)]">{{ $article['excerpt'] }}</p>
                            <div class="mt-5 flex items-center justify-between gap-4">
                                <div class="text-sm font-semibold text-[var(--color-primary-dark)]">
                                    {{ $article['date'] }} · {{ $article['readTime'] }}
                                </div>
                            </div>
                            <div class="mt-6">
                                <a href="{{ route('articles.show', $article['slug']) }}" class="inline-flex items-center gap-2 text-sm font-bold text-[var(--color-primary)]">
                                    Baca selengkapnya
                                    <svg class="size-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
