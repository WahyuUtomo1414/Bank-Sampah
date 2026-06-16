@props(['featuredWaste'])

<section class="section-space bg-[var(--color-primary-dark)] text-white">
    <div class="page-shell">
        <div class="flex flex-col items-center text-center">
            <span class="eyebrow bg-white/10 text-white">Katalog Material</span>
            <h2 class="mt-6 font-display text-3xl font-extrabold md:text-5xl">Sampah Anda Adalah Aset.</h2>
            <p class="mt-6 max-w-2xl text-lg text-white/70">Berikut adalah beberapa jenis sampah yang paling sering disetor oleh warga.</p>
        </div>

        <div class="mt-16 grid grid-cols-1 gap-6 md:grid-cols-3">
            @foreach ($featuredWaste as $item)
                <div class="panel border-white/10 bg-white/5 p-8 backdrop-blur-sm transition-transform hover:-translate-y-2">
                    <div class="flex items-center justify-between">
                        <span class="rounded-full bg-[var(--color-tertiary)] px-3 py-1 text-[10px] font-black uppercase tracking-widest text-[var(--color-ink)]">
                            {{ $item['category'] }}
                        </span>
                        <div class="text-white/40">
                            <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if($item['icon'] === 'beaker')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.628.251a4 4 0 01-2.554.174l-2.014-.403a2 2 0 00-1.022.547l-2.121 2.121a2 2 0 00-.547 1.022l-.477 2.387a6 6 0 00.517 3.86l.251.628a4 4 0 01.174 2.554l-.403 2.014a2 2 0 00.547 1.022l2.121 2.121a2 2 0 001.022-.547l2.387-.477a6 6 0 003.86-.517l.628-.251a4 4 0 012.554-.174l2.014.403a2 2 0 001.022-.547l2.121-2.121a2 2 0 00.547-1.022l.477-2.387a6 6 0 00-.517-3.86l-.251-.628a4 4 0 01-.174-2.554l.403-2.014a2 2 0 00-.547-1.022l-2.121-2.121z" />
                                @elseif($item['icon'] === 'document-text')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                @else
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                @endif
                            </svg>
                        </div>
                    </div>
                    <h3 class="mt-8 font-display text-2xl font-bold leading-tight">{{ $item['name'] }}</h3>
                    <div class="mt-6 flex items-center justify-between border-t border-white/10 pt-6">
                        <span class="text-sm font-medium text-white/50">Harga Estimasi</span>
                        <span class="font-display text-xl font-black text-[var(--color-tertiary)]">{{ $item['price'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>