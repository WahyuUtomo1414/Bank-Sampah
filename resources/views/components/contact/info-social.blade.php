@props(['contactInfo', 'socials'])

<section class="section-space">
    <div class="page-shell">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
            {{-- Primary Contact Methods --}}
            <div class="space-y-8">
                <x-common.section-header
                    eyebrow="Saluran Komunikasi"
                    title="Hubungi Tim Kami Langsung"
                    description="Pilih cara yang paling nyaman bagi Anda untuk berkomunikasi dengan kami."
                />
                
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    @if ($contactInfo['whatsapp'])
                        <a href="{{ $contactInfo['whatsapp'] }}" target="_blank" class="panel group flex items-center gap-5 p-6 hover:bg-[var(--color-primary)]/5">
                            <div class="flex size-12 items-center justify-center rounded-xl bg-green-100 text-green-600 group-hover:bg-green-600 group-hover:text-white transition-colors">
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.588-5.946-0-6.556 5.332-11.891 11.891-11.891 3.181 0 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.402 0 6.556-5.332 11.891-11.891 11.891-2.01 0-3.987-.51-5.742-1.47l-6.254 1.689zm5.95-3.654c1.513.899 3.284 1.373 5.092 1.373 5.404 0 9.802-4.398 9.802-9.803 0-2.62-1.022-5.082-2.872-6.932-1.851-1.852-4.311-2.872-6.93-2.872-5.406 0-9.803 4.397-9.803 9.802 0 1.764.47 3.484 1.36 5.003l-1.02 3.723 3.823-.994zm11.233-7.518c-.244-.122-1.444-.712-1.668-.794-.223-.081-.387-.122-.55.122-.163.244-.63.794-.772.956-.142.162-.284.183-.528.061-.244-.122-1.03-.379-1.961-1.21-.724-.646-1.213-1.444-1.355-1.688-.142-.244-.015-.376.107-.497.11-.11.244-.284.366-.427.122-.142.163-.244.244-.406.081-.163.041-.305-.02-.427-.061-.122-.55-1.321-.752-1.81-.197-.473-.396-.409-.55-.417-.142-.007-.305-.008-.468-.008-.163 0-.427.061-.651.305-.224.244-.855.834-.855 2.033 0 1.199.873 2.358.995 2.521.122.163 1.717 2.622 4.159 3.677.581.251 1.034.401 1.388.514.584.185 1.115.159 1.536.096.47-.07 1.444-.59 1.648-1.159.203-.57.203-1.057.142-1.159-.061-.101-.223-.162-.468-.284z"/></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-widest text-[var(--color-ink-muted)]">WhatsApp</p>
                                <p class="text-lg font-black text-[var(--color-ink)]">Kirim Pesan</p>
                            </div>
                        </a>
                    @endif

                    @if ($contactInfo['phone'])
                        <div class="panel flex items-center gap-5 p-6">
                            <div class="flex size-12 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                                <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-widest text-[var(--color-ink-muted)]">Telepon</p>
                                <p class="text-lg font-black text-[var(--color-ink)]">{{ $contactInfo['phone'] }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                @if ($contactInfo['email'])
                    <div class="panel p-8">
                        <div class="flex size-12 items-center justify-center rounded-xl bg-[var(--color-primary)]/10 text-[var(--color-primary)]">
                            <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <h4 class="mt-6 text-xl font-black text-[var(--color-ink)]">Alamat Email</h4>
                        <p class="mt-2 text-lg text-[var(--color-ink-muted)]">{{ $contactInfo['email'] }}</p>
                    </div>
                @endif

                @if ($contactInfo['address'])
                    <div class="panel p-8">
                        <div class="flex size-12 items-center justify-center rounded-xl bg-[var(--color-primary)]/10 text-[var(--color-primary)]">
                            <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h4 class="mt-6 text-xl font-black text-[var(--color-ink)]">Lokasi Kantor</h4>
                        <p class="mt-2 text-lg leading-relaxed text-[var(--color-ink-muted)]">{{ $contactInfo['address'] }}</p>
                    </div>
                @endif
            </div>

            {{-- Social Media and Decoration --}}
            @if (! empty($socials))
                <div class="flex flex-col gap-8">
                    <div class="panel h-full bg-[var(--color-ink)] p-10 lg:p-12 text-white overflow-hidden relative">
                    <div class="absolute -right-20 -top-20 size-64 rounded-full bg-[var(--color-primary)]/20 blur-3xl"></div>
                    
                    <h3 class="relative z-10 font-display text-3xl font-black">Media Sosial</h3>
                    <p class="relative z-10 mt-4 text-white/60">Ikuti kami untuk mendapatkan update terbaru mengenai kegiatan lingkungan dan edukasi sampah.</p>
                    
                    <div class="relative z-10 mt-12 space-y-4">
                        @foreach ($socials as $social)
                            <a href="{{ $social['url'] }}" target="_blank" class="flex items-center justify-between rounded-2xl bg-white/5 p-6 ring-1 ring-white/10 transition-all hover:bg-white/10 hover:ring-white/30">
                                <div class="flex items-center gap-4">
                                    <div class="flex size-12 items-center justify-center rounded-xl bg-white/10 text-white">
                                        @if($social['icon'] === 'instagram')
                                            <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        @elseif($social['icon'] === 'facebook')
                                            <svg class="size-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                        @else
                                            <svg class="size-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                                        @endif
                                    </div>
                                    <span class="font-bold">{{ $social['name'] }}</span>
                                </div>
                                <svg class="size-5 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 00-2 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
