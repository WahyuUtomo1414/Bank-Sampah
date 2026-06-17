@props(['story'])

<section class="section-space">
    <div class="page-shell">
        <div class="grid grid-cols-1 gap-16 lg:grid-cols-2 lg:items-center">
            <div class="relative">
                <div class="aspect-square overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-[var(--color-primary-container)] to-[var(--color-tertiary)] p-1">
                    <div class="h-full w-full rounded-[2.4rem] bg-white p-8">
                        <div class="flex h-full flex-col justify-between">
                            <div class="flex items-center gap-4">
                                <div class="size-16 rounded-2xl bg-[var(--color-primary)]/10 text-[var(--color-primary)] flex items-center justify-center">
                                    <svg class="size-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                </div>
                                <h3 class="text-2xl font-black text-[var(--color-ink)]">Sejarah Kami</h3>
                            </div>
                            
                            <div class="space-y-6">
                                <div class="h-4 w-full rounded-full bg-[var(--color-surface-container)]"></div>
                                <div class="h-4 w-5/6 rounded-full bg-[var(--color-surface-container)]"></div>
                                <div class="h-4 w-4/6 rounded-full bg-[var(--color-surface-container)]"></div>
                            </div>
                            
                            <div class="rounded-3xl bg-[var(--color-primary)]/5 p-6 ring-1 ring-[var(--color-primary)]/10">
                                <p class="text-sm font-bold text-[var(--color-primary)] italic">"Langkah kecil untuk dampak besar bagi bumi."</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Decorative Elements --}}
                <div class="absolute -right-6 -top-6 size-32 animate-pulse rounded-full bg-[var(--color-tertiary)]/20 blur-3xl"></div>
            </div>

            <div>
                <x-common.section-header
                    eyebrow="Cerita Kami"
                    title="{{ $story['lead'] }}"
                />
                
                <div class="mt-8 space-y-6">
                    @foreach ($story['paragraphs'] as $paragraph)
                        <p class="text-lg leading-relaxed text-[var(--color-ink-muted)]">
                            {{ $paragraph }}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
