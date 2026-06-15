@extends('layouts.app')

@section('title', 'Bank Sampah | Beranda')

@section('content')
    <section class="section-space">
        <div class="page-shell">
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-[1.15fr_0.85fr] lg:items-center">
                <div>
                    <span class="eyebrow">{{ $hero['eyebrow'] }}</span>
                    <h1 class="mt-5 max-w-3xl font-display text-4xl font-extrabold leading-tight text-[var(--color-ink)] md:text-5xl lg:text-6xl">
                        {{ $hero['title'] }}
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-7 text-[var(--color-muted)] md:text-lg">
                        {{ $hero['description'] }}
                    </p>
                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ $hero['primaryCta']['href'] }}" class="btn-primary w-full sm:w-auto">{{ $hero['primaryCta']['label'] }}</a>
                        <a href="{{ $hero['secondaryCta']['href'] }}" class="btn-ghost w-full sm:w-auto">{{ $hero['secondaryCta']['label'] }}</a>
                    </div>
                    <ul class="mt-8 grid grid-cols-1 gap-3 text-sm text-[var(--color-ink)] sm:grid-cols-2">
                        @foreach ($hero['highlights'] as $highlight)
                            <li class="flex items-center gap-3 rounded-2xl bg-white/70 px-4 py-3">
                                <span class="size-2 rounded-full bg-[var(--color-secondary)]"></span>
                                {{ $highlight }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="panel relative overflow-hidden p-6 md:p-8">
                    <div class="absolute inset-x-6 top-6 h-28 rounded-full bg-[var(--color-primary-light)] blur-3xl"></div>
                    <div class="relative space-y-5">
                        <div class="rounded-[1.75rem] bg-[linear-gradient(135deg,#2f7d32_0%,#4caf50_100%)] p-6 text-white">
                            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-white/75">Layanan Hari Ini</p>
                            <h2 class="mt-3 font-display text-2xl font-bold">Setor lebih teratur, tarik saldo lebih jelas.</h2>
                            <p class="mt-3 text-sm leading-6 text-white/80">
                                Semua transaksi dilakukan admin agar penimbangan, estimasi nilai, dan pencatatan saldo tetap konsisten.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="rounded-3xl border border-[var(--color-line)] bg-[var(--color-surface-soft)] p-5">
                                <p class="text-sm font-semibold text-[var(--color-muted)]">Fitur Admin</p>
                                <p class="mt-2 font-display text-xl font-bold text-[var(--color-ink)]">Setor Sampah</p>
                                <p class="mt-2 text-sm leading-6 text-[var(--color-muted)]">Input berat, jenis barang, dan total nilai setoran warga.</p>
                            </div>
                            <div class="rounded-3xl border border-[var(--color-line)] bg-white p-5">
                                <p class="text-sm font-semibold text-[var(--color-muted)]">Fitur Admin</p>
                                <p class="mt-2 font-display text-xl font-bold text-[var(--color-ink)]">Tarik Tunai</p>
                                <p class="mt-2 text-sm leading-6 text-[var(--color-muted)]">Ringkasan penarikan dan sisa saldo tampil lebih rapi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-16 md:pb-20">
        <div class="page-shell">
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-4">
                @foreach ($stats as $stat)
                    <x-stat-card :label="$stat['label']" :value="$stat['value']" :description="$stat['description']" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="page-shell">
            <x-section-heading
                eyebrow="Layanan Utama"
                title="Alur layanan dibuat jelas agar warga tinggal datang dan setor."
                description="Bank Sampah fokus pada layanan yang mudah dipahami warga dan ringan dijalankan admin di lapangan."
            />

            <div class="mt-10 grid grid-cols-1 gap-6 lg:grid-cols-3">
                @foreach ($services as $service)
                    <article class="panel p-6">
                        <div class="flex size-12 items-center justify-center rounded-2xl bg-[var(--color-primary-light)] text-[var(--color-primary-dark)]">
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5v14" />
                            </svg>
                        </div>
                        <h3 class="mt-5 font-display text-2xl font-bold text-[var(--color-ink)]">{{ $service['title'] }}</h3>
                        <p class="mt-3 text-sm leading-7 text-[var(--color-muted)]">{{ $service['description'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="page-shell">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
                <div>
                    <x-section-heading
                        eyebrow="Cara Kerja"
                        title="Empat langkah sederhana dari setoran sampai saldo."
                        description="Warga tidak perlu input sendiri. Admin menangani seluruh proses transaksi agar lebih rapi dan mudah dipahami."
                    />
                </div>

                <div class="space-y-4">
                    @foreach ($workflow as $step)
                        <div class="panel flex gap-4 p-5">
                            <div class="flex size-10 shrink-0 items-center justify-center rounded-full bg-[var(--color-primary)] text-sm font-bold text-white">
                                {{ $loop->iteration }}
                            </div>
                            <p class="pt-1 text-sm leading-7 text-[var(--color-ink)]">{{ $step }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="page-shell">
            <x-section-heading
                eyebrow="Jenis Sampah"
                title="Beberapa jenis sampah yang umum diterima."
                description="Harga dan kategori akan mengikuti data resmi admin. Tahap ini masih memakai contoh tampilan dummy yang siap diintegrasikan."
            />

            <div class="mt-10 grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($featuredWaste as $item)
                    <article class="panel overflow-hidden">
                        <div class="h-40 bg-[linear-gradient(135deg,#dff3e2_0%,#f7fbf7_100%)]"></div>
                        <div class="p-6">
                            <span class="inline-flex rounded-full bg-[var(--color-primary-light)] px-3 py-1 text-xs font-bold uppercase tracking-[0.14em] text-[var(--color-primary-dark)]">{{ $item['category'] }}</span>
                            <h3 class="mt-4 font-display text-2xl font-bold text-[var(--color-ink)]">{{ $item['name'] }}</h3>
                            <p class="mt-2 text-sm leading-6 text-[var(--color-muted)]">Estimasi contoh nilai setoran untuk tampilan publik.</p>
                            <p class="mt-4 text-lg font-semibold text-[var(--color-primary-dark)]">{{ $item['price'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="page-shell">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-[0.9fr_1.1fr]">
                <div>
                    <x-section-heading
                        eyebrow="Edukasi"
                        title="Artikel singkat untuk membangun kebiasaan memilah."
                        description="Konten publik akan membantu warga lebih siap sebelum datang menyetor sampah."
                    />
                </div>

                <div class="grid grid-cols-1 gap-5">
                    @foreach ($articles as $article)
                        <article class="panel p-6">
                            <h3 class="font-display text-xl font-bold text-[var(--color-ink)]">{{ $article['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-[var(--color-muted)]">{{ $article['excerpt'] }}</p>
                            <a href="{{ route('services') }}" class="mt-4 inline-flex text-sm font-semibold text-[var(--color-primary)]">Pelajari alur layanan</a>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="page-shell">
            <div class="panel overflow-hidden bg-[linear-gradient(135deg,#16301b_0%,#2f7d32_55%,#4caf50_100%)] p-8 text-white md:p-10">
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <span class="eyebrow bg-white/12 text-white">Siap Mulai</span>
                        <h2 class="mt-4 max-w-2xl font-display text-3xl font-bold leading-tight md:text-4xl">
                            Ajak lingkungan sekitar memilah sampah lebih rapi dan bernilai.
                        </h2>
                        <p class="mt-4 max-w-2xl text-sm leading-7 text-white/80 md:text-base">
                            Hubungi tim Bank Sampah untuk informasi lokasi, layanan setor, atau koordinasi kegiatan komunitas.
                        </p>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                        <a href="{{ route('contact') }}" class="btn-primary w-full bg-white text-[var(--color-primary-dark)] hover:text-[var(--color-primary-dark)]">Hubungi Kami</a>
                        <a href="{{ route('about') }}" class="btn-ghost w-full border-white/30 bg-transparent text-white hover:border-white hover:text-white">Kenal Lebih Dekat</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
