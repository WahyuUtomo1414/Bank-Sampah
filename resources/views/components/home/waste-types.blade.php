@props(['featuredWaste'])

<section class="dark-band section-space">
    <div class="page-shell relative z-10">
        <div class="mx-auto max-w-3xl text-center">
            <span class="eyebrow bg-white/10 text-white">Jenis Sampah</span>
            <h2 class="mt-6 font-display text-3xl font-extrabold md:text-5xl">Jenis sampah yang paling sering dipilah dan disetor warga.</h2>
            <p class="mt-6 text-base leading-7 text-white/70 md:text-lg md:leading-8">
                Fokus kami bukan banyaknya item katalog, tapi memastikan warga paham jenis material yang layak dipilah dan disetor.
            </p>
        </div>

        <div class="mt-12 rounded-[2rem] border border-white/10 bg-white/4 p-5 backdrop-blur-sm md:p-6">
            <div class="flex flex-col gap-3 border-b border-white/10 pb-5 text-center md:flex-row md:items-end md:justify-between md:text-left">
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-white/45">Daftar Ringkas</p>
                    <p class="mt-2 font-display text-2xl font-bold text-white">Kelompok material yang paling sering disetor warga.</p>
                </div>
                <p class="text-sm leading-6 text-white/55">Geser ke samping untuk melihat daftar.</p>
            </div>

            <div class="scroll-strip mt-6 flex gap-4 overflow-x-auto pb-2">
            @foreach ($featuredWaste as $item)
                <article class="min-w-[16rem] rounded-[1.75rem] border border-white/10 bg-white/6 p-5 shadow-[var(--shadow-soft)] backdrop-blur-sm sm:min-w-[18rem] lg:min-w-[20rem]">
                    <div class="relative h-36 overflow-hidden rounded-[1.25rem] bg-white/10">
                        @if ($item['hasImage'])
                            <img src="{{ $item['imageUrl'] }}" alt="{{ $item['name'] }}" class="h-full w-full object-cover">
                            <div class="absolute inset-0 bg-[linear-gradient(180deg,rgba(22,48,27,0.02),rgba(22,48,27,0.35))]"></div>
                        @else
                            <div class="flex h-full w-full items-center justify-center bg-[linear-gradient(135deg,rgba(255,255,255,0.08),rgba(139,195,74,0.12))]">
                                <x-common.trash-icon class="size-14 text-white/75" />
                            </div>
                        @endif
                        <div class="absolute left-4 top-4">
                            <span class="rounded-full bg-[var(--color-tertiary)] px-3 py-1 text-[10px] font-black uppercase tracking-[0.22em] text-[var(--color-ink)]">
                                {{ $item['category'] }}
                            </span>
                        </div>
                    </div>
                    <h3 class="mt-6 font-display text-2xl font-bold leading-tight text-white">{{ $item['name'] }}</h3>
                    <p class="mt-3 text-sm leading-6 text-white/62">
                        {{ $item['description'] }}
                    </p>
                    <div class="mt-6 flex items-center justify-between gap-4 border-t border-white/10 pt-4">
                        <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-white/40">
                            {{ $item['unit'] ? 'Satuan ' . $item['unit'] : 'Material terpilah' }}
                        </p>
                        @if ($item['price'])
                            <p class="font-display text-lg font-bold text-[var(--color-tertiary)]">{{ $item['price'] }}</p>
                        @endif
                    </div>
                </article>
            @endforeach
            </div>

            <div class="mt-6 flex flex-wrap gap-3">
                @foreach ($featuredWaste as $item)
                    <span class="rounded-full border border-white/12 bg-white/6 px-4 py-2 text-sm font-medium text-white/72">
                        {{ $item['category'] }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>
</section>
