@props(['hero'])

<section class="relative isolate overflow-hidden pt-10 lg:pt-20">
    <div class="page-shell">
        <div class="grid grid-cols-1 gap-16 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
            <div class="relative z-10">
                <span class="eyebrow">{{ $hero['eyebrow'] }}</span>
                <h1 class="mt-8 font-display text-4xl font-black leading-[1.1] text-[var(--color-ink)] md:text-6xl lg:text-7xl">
                    {{ $hero['title'] }}
                </h1>
                <p class="mt-8 max-w-2xl text-lg leading-relaxed text-[var(--color-ink-muted)] md:text-xl">
                    {{ $hero['description'] }}
                </p>
                <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                    <a href="{{ $hero['primaryCta']['href'] }}" class="btn-primary px-8 text-base">
                        {{ $hero['primaryCta']['label'] }}
                    </a>
                    <a href="{{ $hero['secondaryCta']['href'] }}" class="btn-ghost px-8 text-base">
                        {{ $hero['secondaryCta']['label'] }}
                    </a>
                </div>
                <div class="mt-12 flex flex-wrap gap-6">
                    @foreach ($hero['highlights'] as $highlight)
                        <div class="flex items-center gap-2 text-sm font-bold text-[var(--color-primary-dark)]">
                            <svg class="size-5 text-[var(--color-tertiary)]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            {{ $highlight }}
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="relative lg:ml-auto">
                <div class="panel relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-[var(--color-primary)] to-[var(--color-primary-dark)] p-2 shadow-2xl">
                    <div class="aspect-[4/5] rounded-[2rem] bg-white/5 backdrop-blur-sm">
                        <div class="flex h-full flex-col p-8 text-white">
                            <div class="flex items-center gap-4">
                                <div class="flex size-12 items-center justify-center rounded-2xl bg-white/20">
                                    <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-widest text-white/60">Buku Digital</p>
                                    <p class="font-display text-lg font-bold">Ringkasan Transaksi</p>
                                </div>
                            </div>
                            <div class="mt-auto space-y-4">
                                <div class="rounded-2xl bg-white/10 p-4">
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-white/50">Estimasi Saldo</p>
                                    <p class="mt-1 font-display text-2xl font-black">Rp245.500</p>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="rounded-2xl bg-[var(--color-tertiary)] p-4 text-[var(--color-ink)]">
                                        <p class="text-[10px] font-bold uppercase tracking-widest opacity-60">Setoran</p>
                                        <p class="mt-1 font-display text-lg font-black">12.5 kg</p>
                                    </div>
                                    <div class="rounded-2xl bg-white/10 p-4">
                                        <p class="text-[10px] font-bold uppercase tracking-widest text-white/50">Poin</p>
                                        <p class="mt-1 font-display text-lg font-black">850</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Decorative Element --}}
                <div class="absolute -bottom-6 -left-6 -z-10 size-32 rounded-full bg-[var(--color-tertiary)] opacity-20 blur-2xl"></div>
                <div class="absolute -right-10 -top-10 -z-10 size-48 rounded-full bg-[var(--color-primary)] opacity-10 blur-3xl"></div>
            </div>
        </div>
    </div>
</section>