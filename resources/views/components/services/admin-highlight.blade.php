@props(['adminFeatures'])

<section class="section-space relative overflow-hidden bg-[var(--color-surface-container-low)]">
    {{-- Decorative Background Glow --}}
    <div class="absolute -right-24 -top-24 size-96 rounded-full bg-[var(--color-primary)]/5 blur-3xl"></div>
    <div class="absolute -bottom-24 -left-24 size-96 rounded-full bg-[var(--color-tertiary)]/10 blur-3xl"></div>
    
    <div class="page-shell relative z-10">
        <div class="grid grid-cols-1 items-center gap-16 lg:grid-cols-2">
            <div>
                <x-common.section-header
                    eyebrow="Aman & Terukur"
                    title="Proses Transaksi Terintegrasi"
                    description="Seluruh transaksi setor dan tarik saldo dikelola oleh admin secara digital untuk memastikan akurasi data dan keamanan tabungan warga."
                />
                
                <div class="mt-12 space-y-4">
                    @foreach ($adminFeatures as $feature)
                        <div class="group flex gap-6 rounded-2xl bg-white p-6 shadow-[var(--shadow-soft)] ring-1 ring-[var(--color-outline-variant)] transition-all hover:shadow-[var(--shadow-lift)] hover:-translate-y-0.5">
                            <div class="flex size-14 shrink-0 items-center justify-center rounded-xl bg-[var(--color-primary)]/10 text-[var(--color-primary)] transition-colors group-hover:bg-[var(--color-primary)] group-hover:text-white">
                                <svg class="size-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-[var(--color-ink)]">{{ $feature['title'] }}</h4>
                                <p class="mt-2 text-sm leading-relaxed text-[var(--color-ink-muted)]">{{ $feature['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="relative hidden lg:block">
                {{-- Mockup Visual --}}
                <div class="relative overflow-hidden rounded-[2.5rem] bg-white p-4 shadow-[0_32px_64px_-12px_rgba(0,0,0,0.1)] ring-1 ring-[var(--color-outline-variant)]">
                    <div class="aspect-[4/3] rounded-[1.5rem] bg-[var(--color-ink)] p-8">
                         <div class="flex h-full flex-col justify-between">
                            <div class="flex items-center justify-between border-b border-white/10 pb-6">
                                <div class="flex items-center gap-3">
                                    <div class="size-10 rounded-xl bg-[var(--color-primary)]"></div>
                                    <div class="space-y-1.5">
                                        <div class="h-3 w-20 rounded-full bg-white/20"></div>
                                        <div class="h-2 w-12 rounded-full bg-white/10"></div>
                                    </div>
                                </div>
                                <div class="h-8 w-24 rounded-lg bg-white/5"></div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4 py-8">
                                <div class="rounded-2xl bg-white/5 p-4">
                                    <div class="h-2 w-12 rounded-full bg-white/20"></div>
                                    <div class="mt-3 h-6 w-20 rounded-full bg-white/40"></div>
                                </div>
                                <div class="rounded-2xl bg-white/5 p-4">
                                    <div class="h-2 w-12 rounded-full bg-white/20"></div>
                                    <div class="mt-3 h-6 w-20 rounded-full bg-white/40"></div>
                                </div>
                            </div>

                            <div class="mt-auto flex items-center gap-4 border-t border-white/10 pt-6">
                                <div class="h-10 flex-1 rounded-xl bg-[var(--color-primary)]/20"></div>
                                <div class="h-10 flex-1 rounded-xl bg-[var(--color-primary)]"></div>
                            </div>
                         </div>
                    </div>
                </div>
                
                {{-- Decorative Floating Badges --}}
                <div class="absolute -right-8 top-20 rounded-2xl bg-[var(--color-tertiary-container)] p-4 shadow-xl ring-1 ring-[var(--color-outline-variant)] animate-bounce" style="animation-duration: 4s">
                    <div class="flex items-center gap-3">
                        <div class="flex size-10 items-center justify-center rounded-full bg-white text-[var(--color-primary)] shadow-sm">
                            <svg class="size-6" fill="currentColor" viewBox="0 0 20 20"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/><path d="M12 2.252A8.001 8.001 0 0117.748 8H12V2.252z"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-[var(--color-ink-muted)]">Data Valid</p>
                            <p class="text-sm font-black text-[var(--color-ink)]">100% Akurat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
