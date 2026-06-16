<header 
    class="sticky top-0 z-50 border-b border-[var(--color-outline-variant)] bg-white/80 backdrop-blur-xl transition-all duration-300"
>
    <div class="page-shell">
        <div class="flex items-center justify-between py-4">
            <!-- Brand -->
            <a href="{{ route('home') }}" class="group flex items-center gap-3">
                <div class="flex size-11 items-center justify-center rounded-xl bg-[var(--color-primary)] text-lg font-black text-white transition-transform group-hover:scale-105">
                    BS
                </div>
                <div class="hidden sm:block">
                    <p class="font-display text-base font-bold leading-none text-[var(--color-ink)]">Bank Sampah</p>
                    <p class="mt-1 text-[11px] font-medium text-[var(--color-ink-muted)]">Hijau, rapi, dan bernilai</p>
                </div>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden items-center gap-1 lg:flex">
                @php
                    $navItems = [
                        ['route' => 'home', 'label' => 'Beranda'],
                        ['route' => 'services', 'label' => 'Layanan'],
                        ['route' => 'articles', 'label' => 'Artikel'],
                        ['route' => 'about', 'label' => 'Tentang Kami'],
                        ['route' => 'contact', 'label' => 'Kontak'],
                    ];
                @endphp

                @foreach ($navItems as $item)
                    <a 
                        href="{{ route($item['route']) }}" 
                        class="relative rounded-lg px-4 py-2 text-sm font-semibold transition-colors {{ request()->routeIs($item['route']) ? 'text-[var(--color-primary)]' : 'text-[var(--color-ink-muted)] hover:bg-[var(--color-surface-container)] hover:text-[var(--color-ink)]' }}"
                    >
                        {{ $item['label'] }}
                        @if (request()->routeIs($item['route']))
                            <span class="absolute bottom-1.5 left-4 right-4 h-0.5 rounded-full bg-[var(--color-primary)]"></span>
                        @endif
                    </a>
                @endforeach
            </nav>

            <!-- Mobile Toggle -->
            <button
                type="button"
                class="inline-flex size-11 items-center justify-center rounded-xl border border-[var(--color-outline-variant)] bg-white text-[var(--color-ink)] transition-colors hover:bg-[var(--color-surface-container)] lg:hidden"
                data-nav-toggle
                aria-expanded="false"
                aria-controls="mobile-menu"
            >
                <span class="sr-only">Menu Utama</span>
                <svg 
                    class="size-6" 
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                >
                    <path stroke-linecap="round" d="M4 8h16M4 16h16" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div 
            id="mobile-menu"
            class="hidden lg:hidden" 
            data-nav-menu
        >
            <div class="panel mb-4 overflow-hidden border-none bg-white/95 p-2 shadow-xl ring-1 ring-black/5">
                @foreach ($navItems as $item)
                    <a 
                        href="{{ route($item['route']) }}" 
                        class="block rounded-lg px-4 py-3 text-sm font-bold transition-colors {{ request()->routeIs($item['route']) ? 'bg-[var(--color-surface-container)] text-[var(--color-primary)]' : 'text-[var(--color-ink)] hover:bg-[var(--color-surface-container-low)]' }}"
                    >
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</header>
