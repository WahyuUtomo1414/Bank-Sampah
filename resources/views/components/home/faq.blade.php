@props(['faqs'])

<section class="soft-band section-space">
    <div class="page-shell">
        <div class="flex flex-col items-center text-center">
            <x-common.section-header
                align="center"
                eyebrow="FAQ"
                title="Pertanyaan yang Sering Diajukan."
                description="Punya pertanyaan? Mungkin jawaban yang Anda cari ada di bawah ini."
            />
        </div>

        <div class="mt-16 mx-auto max-w-4xl space-y-4">
            @forelse ($faqs as $index => $faq)
                <div 
                    class="panel group overflow-hidden" 
                    x-data="{ open: false }"
                >
                    <button 
                        @click="open = !open" 
                        class="flex w-full items-center justify-between p-6 text-left transition-colors hover:bg-[var(--color-surface-container-low)]"
                    >
                        <span class="font-display text-lg font-bold text-[var(--color-ink)]">{{ $faq['question'] }}</span>
                        <span 
                            class="flex size-8 shrink-0 items-center justify-center rounded-full bg-[var(--color-surface-container)] text-[var(--color-primary)] transition-transform duration-300"
                            :class="{ 'rotate-180': open }"
                        >
                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </button>
                    <div 
                        x-show="open" 
                        x-collapse
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="border-t border-[var(--color-outline-variant)] bg-[var(--color-surface)] p-6"
                    >
                        <p class="text-base leading-relaxed text-[var(--color-ink-muted)]">{{ $faq['answer'] }}</p>
                    </div>
                </div>
            @empty
                <div class="rounded-[1.75rem] border border-dashed border-[var(--color-outline-variant)] bg-white/70 p-6 text-sm leading-7 text-[var(--color-ink-muted)]">
                    FAQ belum tersedia. Pertanyaan umum akan tampil di sini setelah data diisi dari admin.
                </div>
            @endforelse
        </div>
    </div>
</section>
