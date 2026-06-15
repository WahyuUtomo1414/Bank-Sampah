@extends('layouts.app')

@section('title', 'Bank Sampah | Artikel')

@section('content')
    <section class="section-space">
        <div class="page-shell">
            <x-section-heading :eyebrow="$hero['eyebrow']" :title="$hero['title']" :description="$hero['description']" />

            <div class="mt-10 panel overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-[1.1fr_0.9fr]">
                    <div class="bg-[linear-gradient(135deg,#dff3e2_0%,#f7fbf7_100%)] p-8 md:p-10">
                        <span class="inline-flex rounded-full bg-white/80 px-3 py-1 text-xs font-bold uppercase tracking-[0.14em] text-[var(--color-primary-dark)]">
                            {{ $featuredArticle['category'] }}
                        </span>
                        <h2 class="mt-5 font-display text-3xl font-bold leading-tight text-[var(--color-ink)] md:text-4xl">
                            {{ $featuredArticle['title'] }}
                        </h2>
                        <p class="mt-4 max-w-2xl text-sm leading-7 text-[var(--color-muted)] md:text-base">
                            {{ $featuredArticle['excerpt'] }}
                        </p>
                        <p class="mt-6 text-sm font-semibold text-[var(--color-primary-dark)]">{{ $featuredArticle['meta'] }}</p>
                    </div>
                    <div class="bg-white p-8 md:p-10">
                        <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[var(--color-muted)]">Topik Populer</p>
                        <div class="mt-5 flex flex-wrap gap-3">
                            @foreach ($categories as $category)
                                <span class="inline-flex rounded-full bg-[var(--color-primary-light)] px-4 py-2 text-sm font-semibold text-[var(--color-primary-dark)]">
                                    {{ $category }}
                                </span>
                            @endforeach
                        </div>
                        <div class="mt-8 rounded-[1.5rem] bg-[var(--color-surface-soft)] p-5">
                            <p class="font-display text-xl font-bold text-[var(--color-ink)]">Konten edukasi untuk mendukung kebiasaan memilah.</p>
                            <p class="mt-3 text-sm leading-7 text-[var(--color-muted)]">
                                Tahap ini masih frontend dummy. Struktur halaman sudah siap untuk dihubungkan ke data artikel dari backend nanti.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-space pt-0">
        <div class="page-shell">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($articles as $article)
                    <article class="panel overflow-hidden">
                        <div class="h-44 bg-[linear-gradient(135deg,#f2f8f2_0%,#dff0e1_100%)]"></div>
                        <div class="p-6">
                            <span class="inline-flex rounded-full bg-[var(--color-primary-light)] px-3 py-1 text-xs font-bold uppercase tracking-[0.14em] text-[var(--color-primary-dark)]">
                                {{ $article['category'] }}
                            </span>
                            <h3 class="mt-4 font-display text-2xl font-bold leading-snug text-[var(--color-ink)]">
                                {{ $article['title'] }}
                            </h3>
                            <p class="mt-3 text-sm leading-7 text-[var(--color-muted)]">{{ $article['excerpt'] }}</p>
                            <div class="mt-5 flex items-center justify-between gap-4">
                                <span class="text-sm font-semibold text-[var(--color-primary-dark)]">{{ $article['meta'] }}</span>
                                <a href="{{ route('contact') }}" class="text-sm font-semibold text-[var(--color-primary)]">Tanya Admin</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
