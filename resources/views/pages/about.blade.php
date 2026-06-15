@extends('layouts.app')

@section('title', 'Bank Sampah | Tentang Kami')

@section('content')
    <section class="section-space">
        <div class="page-shell">
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-[1fr_0.85fr] lg:items-center">
                <div>
                    <x-section-heading :eyebrow="$hero['eyebrow']" :title="$hero['title']" :description="$hero['description']" />
                </div>
                <div class="panel h-full min-h-80 bg-[linear-gradient(135deg,#dff3e2_0%,#f7fbf7_40%,#cfe7d2_100%)] p-8">
                    <div class="flex h-full flex-col justify-between rounded-[1.5rem] border border-white/80 bg-white/65 p-6 backdrop-blur">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[var(--color-muted)]">Komitmen Kami</p>
                            <p class="mt-4 font-display text-3xl font-bold text-[var(--color-primary-dark)]">Lingkungan yang lebih tertib dimulai dari kebiasaan kecil.</p>
                        </div>
                        <p class="text-sm leading-7 text-[var(--color-muted)]">Bank Sampah hadir bukan hanya untuk transaksi, tetapi untuk membangun pola pengelolaan sampah yang lebih sadar dan berkelanjutan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="page-shell">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-[0.95fr_1.05fr]">
                <div>
                    <x-section-heading eyebrow="Cerita Kami" title="{{ $story['lead'] }}" />
                </div>
                <div class="space-y-5">
                    @foreach ($story['paragraphs'] as $paragraph)
                        <div class="panel p-6">
                            <p class="text-sm leading-7 text-[var(--color-muted)] md:text-base">{{ $paragraph }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="page-shell">
            <x-section-heading
                eyebrow="Nilai Utama"
                title="Prinsip yang menjaga layanan tetap rapi, hangat, dan terpercaya."
                description="Nilai ini menjadi dasar cara kami melayani warga dan menjalankan pengelolaan sampah di lapangan."
            />

            <div class="mt-10 grid grid-cols-1 gap-6 lg:grid-cols-3">
                @foreach ($values as $value)
                    <article class="panel p-6">
                        <h3 class="font-display text-2xl font-bold text-[var(--color-ink)]">{{ $value['title'] }}</h3>
                        <p class="mt-3 text-sm leading-7 text-[var(--color-muted)]">{{ $value['description'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="page-shell">
            <div class="panel overflow-hidden p-8 md:p-10">
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                    <div>
                        <span class="eyebrow">Visi</span>
                        <h2 class="mt-4 font-display text-3xl font-bold leading-tight text-[var(--color-ink)]">{{ $visionMission['vision'] }}</h2>
                    </div>
                    <div>
                        <span class="eyebrow">Misi</span>
                        <ul class="mt-5 space-y-4">
                            @foreach ($visionMission['missions'] as $mission)
                                <li class="flex gap-4 rounded-2xl bg-[var(--color-surface-soft)] px-4 py-4 text-sm leading-7 text-[var(--color-ink)]">
                                    <span class="mt-2 size-2 rounded-full bg-[var(--color-primary)]"></span>
                                    <span>{{ $mission }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
