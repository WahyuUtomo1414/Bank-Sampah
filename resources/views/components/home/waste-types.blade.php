@props(['featuredWaste'])

<section class="dark-band section-space">
    <div class="page-shell relative z-10">
        <div class="mx-auto max-w-3xl text-center">
            <span class="eyebrow bg-white/10 text-white">Jenis Sampah</span>
            <h2 class="mt-6 font-display text-3xl font-extrabold md:text-5xl">Sampah yang umum diterima bank sampah.</h2>
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
                    <div class="flex items-center justify-between gap-3">
                        <span class="rounded-full bg-[var(--color-tertiary)] px-3 py-1 text-[10px] font-black uppercase tracking-[0.22em] text-[var(--color-ink)]">
                            {{ $item['category'] }}
                        </span>
                        <div class="rounded-2xl bg-white/8 p-3 text-white/65">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    <h3 class="mt-6 font-display text-2xl font-bold leading-tight text-white">{{ $item['name'] }}</h3>
                    <p class="mt-3 text-sm leading-6 text-white/62">
                        Pastikan material dalam kondisi relatif bersih, kering, dan mudah dipisahkan saat proses setor.
                    </p>
                    <div class="mt-6 h-px w-full bg-white/10"></div>
                    <p class="mt-4 text-[11px] font-bold uppercase tracking-[0.22em] text-white/40">
                        Material terpilah
                    </p>
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
