@extends('layouts.public')

@section('title', 'Bank Sampah | ' . $article['title'])
@section('meta_description', $article['excerpt'])

@section('content')
    <section class="soft-band section-space">
        <div class="page-shell">
            <div class="max-w-4xl">
                <a href="{{ route('articles') }}" class="inline-flex items-center gap-2 text-sm font-bold text-[var(--color-primary)]">
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali ke artikel
                </a>

                <div class="mt-8">
                    <span class="eyebrow">{{ $article['category'] }}</span>
                    <h1 class="mt-6 font-display text-4xl font-extrabold leading-tight text-[var(--color-ink)] md:text-5xl lg:text-6xl">
                        {{ $article['title'] }}
                    </h1>
                    <div class="mt-6 flex flex-wrap items-center gap-4 text-sm font-semibold text-[var(--color-primary-dark)]">
                        <span>{{ $article['date'] }}</span>
                        <span class="h-1 w-1 rounded-full bg-[var(--color-outline)]"></span>
                        <span>{{ $article['readTime'] }}</span>
                    </div>
                    <p class="mt-6 max-w-3xl text-base leading-8 text-[var(--color-ink-muted)] md:text-lg">
                        {{ $article['excerpt'] }}
                    </p>
                </div>

                <div class="mt-10 overflow-hidden rounded-[2rem] border border-[var(--color-outline-variant)] bg-[linear-gradient(135deg,#f2f8f2_0%,#dff0e1_100%)]">
                    <div class="relative h-[18rem] md:h-[24rem]">
                        @if ($article['hasImage'])
                            <img src="{{ $article['imageUrl'] }}" alt="{{ $article['title'] }}" class="absolute inset-0 h-full w-full object-cover">
                            <div class="absolute inset-0 bg-[linear-gradient(180deg,rgba(247,251,247,0.15),rgba(22,48,27,0.3))]"></div>
                        @else
                            <div class="absolute inset-0 flex items-center justify-center">
                                <x-common.trash-icon class="size-40 text-[var(--color-primary)]/22" />
                            </div>
                        @endif
                        <div class="absolute inset-0 soft-grid opacity-45"></div>
                        <div class="absolute inset-8 flex items-end">
                            <div class="rounded-[1.5rem] bg-white/88 px-5 py-4 shadow-[var(--shadow-soft)] backdrop-blur-sm">
                                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[var(--color-ink-muted)]">Artikel Edukasi</p>
                                <p class="mt-2 font-display text-xl font-bold text-[var(--color-ink)]">{{ $article['category'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-space pt-0">
        <div class="page-shell">
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-[minmax(0,1fr)_18rem] lg:gap-12">
                <article class="rounded-[2rem] border border-[var(--color-outline-variant)] bg-white p-6 shadow-[var(--shadow-soft)] md:p-8 lg:p-10">
                    <div class="space-y-6 text-[var(--color-ink-muted)]">
                        @foreach (preg_split("/\n\s*\n/", trim($article['content'])) as $paragraph)
                            <p class="text-base leading-8 md:text-lg">{{ trim($paragraph) }}</p>
                        @endforeach
                    </div>
                </article>

                <aside class="space-y-5">
                    <div class="rounded-[1.75rem] border border-[var(--color-outline-variant)] bg-[var(--color-surface)] p-5">
                        <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[var(--color-ink-muted)]">Ringkasan</p>
                        <p class="mt-3 text-sm leading-7 text-[var(--color-ink-muted)]">
                            Artikel ini membahas langkah praktis yang bisa langsung diterapkan warga untuk pengelolaan sampah yang lebih tertib.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-[var(--color-outline-variant)] bg-white p-5 shadow-[var(--shadow-soft)]">
                        <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[var(--color-ink-muted)]">Butuh Bantuan</p>
                        <p class="mt-3 text-sm leading-7 text-[var(--color-ink-muted)]">
                            Jika ingin tanya alur setor atau jenis sampah yang diterima, hubungi admin bank sampah.
                        </p>
                        <div class="mt-5">
                            <a href="{{ route('contact') }}" class="btn-primary w-full">Hubungi Admin</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    @if ($relatedArticles->isNotEmpty())
        <section class="soft-band section-space pt-0">
            <div class="page-shell">
                <div class="mb-8">
                    <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[var(--color-ink-muted)]">Artikel Terkait</p>
                    <h2 class="mt-2 font-display text-3xl font-bold text-[var(--color-ink)]">Lanjut baca topik serupa.</h2>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($relatedArticles as $relatedArticle)
                        <article class="overflow-hidden rounded-[1.75rem] border border-[var(--color-outline-variant)] bg-white shadow-[var(--shadow-soft)]">
                            <div class="relative h-40 overflow-hidden bg-[linear-gradient(135deg,#f2f8f2_0%,#dff0e1_100%)]">
                                @if ($relatedArticle['hasImage'])
                                    <img src="{{ $relatedArticle['imageUrl'] }}" alt="{{ $relatedArticle['title'] }}" class="absolute inset-0 h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-[linear-gradient(180deg,rgba(247,251,247,0.12),rgba(22,48,27,0.22))]"></div>
                                @else
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <x-common.trash-icon class="size-24 text-[var(--color-primary)]/20" />
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <span class="inline-flex rounded-full bg-[var(--color-primary-soft)] px-3 py-1 text-[10px] font-bold uppercase tracking-[0.18em] text-[var(--color-primary-dark)]">
                                    {{ $relatedArticle['category'] }}
                                </span>
                                <h3 class="mt-4 font-display text-2xl font-bold leading-snug text-[var(--color-ink)]">
                                    {{ $relatedArticle['title'] }}
                                </h3>
                                <p class="mt-3 text-sm leading-7 text-[var(--color-ink-muted)]">{{ $relatedArticle['excerpt'] }}</p>
                                <div class="mt-5 text-sm font-semibold text-[var(--color-primary-dark)]">
                                    {{ $relatedArticle['date'] }} · {{ $relatedArticle['readTime'] }}
                                </div>
                                <div class="mt-5">
                                    <a href="{{ route('articles.show', $relatedArticle['slug']) }}" class="inline-flex items-center gap-2 text-sm font-bold text-[var(--color-primary)]">
                                        Baca artikel
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    @endif
@endsection
