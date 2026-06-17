@props(['visionMission'])

<section class="section-space bg-[var(--color-surface-container-low)]">
    <div class="page-shell">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
            <div class="panel p-10 lg:p-12">
                <span class="eyebrow mb-6">Visi</span>
                <h3 class="font-display text-3xl font-black leading-[1.15] text-[var(--color-ink)] lg:text-4xl">
                    {{ $visionMission['vision'] }}
                </h3>
            </div>
            
            <div class="panel p-10 lg:p-12">
                <span class="eyebrow mb-6">Misi</span>
                <ul class="space-y-6">
                    @foreach ($visionMission['missions'] as $mission)
                        <li class="flex items-start gap-4">
                            <div class="flex size-8 shrink-0 items-center justify-center rounded-full bg-[var(--color-primary)] text-white">
                                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="text-lg font-bold text-[var(--color-ink)] leading-tight">{{ $mission }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
