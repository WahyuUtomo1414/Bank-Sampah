<header class="sticky top-0 z-50 border-b border-white/50 bg-white/75 backdrop-blur-xl">
    <div class="page-shell">
        <div class="flex items-center justify-between py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="flex size-11 items-center justify-center rounded-2xl bg-[var(--color-primary)] text-lg font-extrabold text-white">BS</span>
                <div>
                    <p class="font-display text-base font-bold text-[var(--color-ink)]">Bank Sampah</p>
                    <p class="text-xs text-[var(--color-muted)]">Hijau, rapi, dan bernilai</p>
                </div>
            </a>

            <button
                type="button"
                class="inline-flex size-11 items-center justify-center rounded-xl border border-[var(--color-line)] bg-white text-[var(--color-ink)] md:hidden"
                data-nav-toggle
                aria-expanded="false"
                aria-controls="mobile-menu"
            >
                <span class="sr-only">Buka menu</span>
                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16" />
                </svg>
            </button>

            <nav class="hidden items-center gap-8 md:flex">
                <a href="{{ route('home') }}" class="relative text-sm font-semibold {{ request()->routeIs('home') ? 'text-[var(--color-primary)]' : 'text-[var(--color-muted)] hover:text-[var(--color-ink)]' }}">
                    Beranda
                    @if (request()->routeIs('home'))
                        <span class="absolute -bottom-3 left-1/2 size-1.5 -translate-x-1/2 rounded-full bg-[var(--color-secondary)]"></span>
                    @endif
                </a>
                <a href="{{ route('services') }}" class="relative text-sm font-semibold {{ request()->routeIs('services') ? 'text-[var(--color-primary)]' : 'text-[var(--color-muted)] hover:text-[var(--color-ink)]' }}">
                    Layanan
                    @if (request()->routeIs('services'))
                        <span class="absolute -bottom-3 left-1/2 size-1.5 -translate-x-1/2 rounded-full bg-[var(--color-secondary)]"></span>
                    @endif
                </a>
                <a href="{{ route('articles') }}" class="relative text-sm font-semibold {{ request()->routeIs('articles') ? 'text-[var(--color-primary)]' : 'text-[var(--color-muted)] hover:text-[var(--color-ink)]' }}">
                    Artikel
                    @if (request()->routeIs('articles'))
                        <span class="absolute -bottom-3 left-1/2 size-1.5 -translate-x-1/2 rounded-full bg-[var(--color-secondary)]"></span>
                    @endif
                </a>
                <a href="{{ route('about') }}" class="relative text-sm font-semibold {{ request()->routeIs('about') ? 'text-[var(--color-primary)]' : 'text-[var(--color-muted)] hover:text-[var(--color-ink)]' }}">
                    Tentang Kami
                    @if (request()->routeIs('about'))
                        <span class="absolute -bottom-3 left-1/2 size-1.5 -translate-x-1/2 rounded-full bg-[var(--color-secondary)]"></span>
                    @endif
                </a>
                <a href="{{ route('contact') }}" class="relative text-sm font-semibold {{ request()->routeIs('contact') ? 'text-[var(--color-primary)]' : 'text-[var(--color-muted)] hover:text-[var(--color-ink)]' }}">
                    Kontak
                    @if (request()->routeIs('contact'))
                        <span class="absolute -bottom-3 left-1/2 size-1.5 -translate-x-1/2 rounded-full bg-[var(--color-secondary)]"></span>
                    @endif
                </a>
                <a href="{{ route('contact') }}" class="btn-primary">Konsultasi Layanan</a>
            </nav>
        </div>

        <div id="mobile-menu" class="hidden pb-4 md:hidden" data-nav-menu>
            <div class="panel overflow-hidden">
                <a href="{{ route('home') }}" class="block border-b border-[var(--color-line)] px-4 py-3 text-sm font-semibold text-[var(--color-ink)]">Beranda</a>
                <a href="{{ route('services') }}" class="block border-b border-[var(--color-line)] px-4 py-3 text-sm font-semibold text-[var(--color-ink)]">Layanan</a>
                <a href="{{ route('articles') }}" class="block border-b border-[var(--color-line)] px-4 py-3 text-sm font-semibold text-[var(--color-ink)]">Artikel</a>
                <a href="{{ route('about') }}" class="block border-b border-[var(--color-line)] px-4 py-3 text-sm font-semibold text-[var(--color-ink)]">Tentang Kami</a>
                <a href="{{ route('contact') }}" class="block px-4 py-3 text-sm font-semibold text-[var(--color-ink)]">Kontak</a>
                <div class="p-4">
                    <a href="{{ route('contact') }}" class="btn-primary w-full">Konsultasi Layanan</a>
                </div>
            </div>
        </div>
    </div>
</header>
