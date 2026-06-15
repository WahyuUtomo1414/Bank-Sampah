@extends('layouts.app')

@section('title', 'Bank Sampah | Layanan')

@section('content')
    <section class="section-space">
        <div class="page-shell">
            <x-section-heading :eyebrow="$hero['eyebrow']" :title="$hero['title']" :description="$hero['description']" />

            <div class="mt-10 grid grid-cols-1 gap-6 lg:grid-cols-3">
                @foreach ($services as $service)
                    <article class="panel p-6">
                        <h2 class="font-display text-2xl font-bold text-[var(--color-ink)]">{{ $service['title'] }}</h2>
                        <p class="mt-3 text-sm leading-7 text-[var(--color-muted)]">{{ $service['description'] }}</p>
                        <ul class="mt-5 space-y-3">
                            @foreach ($service['points'] as $point)
                                <li class="flex gap-3 text-sm text-[var(--color-ink)]">
                                    <span class="mt-2 size-2 rounded-full bg-[var(--color-secondary)]"></span>
                                    <span>{{ $point }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="page-shell">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-[0.95fr_1.05fr]">
                <div>
                    <x-section-heading
                        eyebrow="Fitur Admin"
                        title="UI admin difokuskan untuk dua proses inti."
                        description="Tahap ini masih dummy frontend. Arah tampilannya sudah disiapkan untuk integrasi Filament dan data transaksi."
                    />
                </div>

                <div class="space-y-4">
                    @foreach ($adminFeatures as $feature)
                        <article class="panel p-5">
                            <h3 class="font-display text-xl font-bold text-[var(--color-ink)]">{{ $feature['title'] }}</h3>
                            <p class="mt-2 text-sm leading-7 text-[var(--color-muted)]">{{ $feature['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="page-shell">
            <x-section-heading
                eyebrow="Jenis Sampah Umum"
                title="Contoh kategori sampah yang biasa diterima."
                description="Daftar final akan mengikuti data master barang dari admin. Tampilan ini dibuat agar struktur frontend siap lebih dulu."
            />

            <div class="mt-10 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($acceptedWaste as $item)
                    <div class="panel flex items-center gap-4 p-5">
                        <span class="flex size-11 items-center justify-center rounded-2xl bg-[var(--color-primary-light)] text-[var(--color-primary-dark)]">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h10v10H7z" />
                            </svg>
                        </span>
                        <p class="text-sm font-semibold text-[var(--color-ink)]">{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
