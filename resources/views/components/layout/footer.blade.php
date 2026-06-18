@props(['footer'])

<footer class="mt-auto border-t border-[var(--color-outline-variant)] bg-[var(--color-primary-dark)] text-white/90">
    <div class="page-shell py-16 md:py-24">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-8">
            <!-- Branding -->
            <div class="space-y-6 lg:col-span-6">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    @if ($footer['brand']['logoUrl'])
                        <div class="flex size-11 items-center justify-center overflow-hidden rounded-xl bg-white/10">
                            <img src="{{ $footer['brand']['logoUrl'] }}" alt="{{ $footer['brand']['name'] }}" class="h-full w-full object-cover">
                        </div>
                    @else
                        <div class="flex size-11 items-center justify-center rounded-xl bg-white/10 text-lg font-black text-white">
                            {{ $footer['brand']['initials'] }}
                        </div>
                    @endif
                    <span class="font-display text-xl font-bold tracking-tight text-white">{{ $footer['brand']['name'] }}</span>
                </a>
                <p class="max-w-md text-sm leading-relaxed text-white/70">
                    {{ $footer['brand']['description'] }}
                </p>
                @if (! empty($footer['socials']))
                    <div class="flex flex-wrap items-center gap-4 text-sm font-semibold text-white/70">
                        @foreach ($footer['socials'] as $social)
                            <a href="{{ $social['url'] }}" target="_blank" rel="noreferrer" class="transition-colors hover:text-white">
                                {{ $social['name'] }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Links -->
            <div class="lg:col-span-3">
                <h3 class="font-display text-sm font-bold uppercase tracking-widest text-white/50">Navigasi</h3>
                <ul class="mt-6 space-y-4 text-sm font-medium">
                    @foreach ($footer['navItems'] as $item)
                        <li><a href="{{ route($item['route']) }}" class="transition-colors hover:text-[var(--color-tertiary)]">{{ $item['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact -->
            <div class="lg:col-span-3">
                <h3 class="font-display text-sm font-bold uppercase tracking-widest text-white/50">Kantor Kami</h3>
                <ul class="mt-6 space-y-4 text-sm font-medium">
                    @if ($footer['contact']['address'])
                        <li><span class="text-white/70">{{ $footer['contact']['address'] }}</span></li>
                    @endif
                    @if ($footer['contact']['phone'])
                        <li><span class="text-white/70">{{ $footer['contact']['phone'] }}</span></li>
                    @endif
                    @if ($footer['contact']['email'])
                        <li><span class="text-white/70">{{ $footer['contact']['email'] }}</span></li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="mt-16 border-t border-white/10 pt-8 text-center">
            <p class="text-xs font-medium text-white/40">
                &copy; {{ $footer['copyright']['year'] }} {{ $footer['copyright']['name'] }}. Seluruh hak cipta dilindungi.
            </p>
        </div>
    </div>
</footer>
