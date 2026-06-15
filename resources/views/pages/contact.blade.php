@extends('layouts.app')

@section('title', 'Bank Sampah | Kontak')

@section('content')
    <section class="section-space">
        <div class="page-shell">
            <x-section-heading :eyebrow="$hero['eyebrow']" :title="$hero['title']" :description="$hero['description']" />

            <div class="mt-10 grid grid-cols-1 gap-8 lg:grid-cols-[0.9fr_1.1fr]">
                <div class="space-y-4">
                    <article class="panel p-6">
                        <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[var(--color-muted)]">Info Kontak</p>
                        <div class="mt-4 space-y-3 text-sm leading-7 text-[var(--color-ink)]">
                            <p><strong>Telepon:</strong> {{ $contactInfo['phone'] }}</p>
                            <p><strong>WhatsApp:</strong> {{ $contactInfo['whatsapp'] }}</p>
                            <p><strong>Email:</strong> {{ $contactInfo['email'] }}</p>
                            <p><strong>Alamat:</strong> {{ $contactInfo['address'] }}</p>
                            <p><strong>Jam Layanan:</strong> {{ $contactInfo['hours'] }}</p>
                        </div>
                    </article>

                    <article class="panel p-6">
                        <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[var(--color-muted)]">Catatan Lokasi</p>
                        <p class="mt-4 text-sm leading-7 text-[var(--color-muted)]">{{ $locationNote }}</p>
                    </article>
                </div>

                <div class="panel p-6 md:p-8">
                    <h2 class="font-display text-2xl font-bold text-[var(--color-ink)]">Kirim pertanyaan atau koordinasi layanan</h2>
                    <p class="mt-3 text-sm leading-7 text-[var(--color-muted)]">
                        Form ini masih dummy UI. Nanti tinggal dihubungkan ke backend sesuai kebutuhan tim admin.
                    </p>

                    <form class="mt-8 space-y-5">
                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-[var(--color-ink)]">Nama</label>
                                <input type="text" class="input-field" placeholder="Masukkan nama lengkap">
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-[var(--color-ink)]">Nomor WhatsApp</label>
                                <input type="text" class="input-field" placeholder="08xxxxxxxxxx">
                            </div>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-[var(--color-ink)]">Topik</label>
                            <select class="input-field">
                                <option>Pilih topik pertanyaan</option>
                                @foreach ($inquiryOptions as $option)
                                    <option>{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-[var(--color-ink)]">Pesan</label>
                            <textarea class="input-field min-h-36" placeholder="Tulis kebutuhan atau pertanyaan Anda"></textarea>
                        </div>

                        <button type="button" class="btn-primary w-full md:w-auto">Kirim Pertanyaan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
