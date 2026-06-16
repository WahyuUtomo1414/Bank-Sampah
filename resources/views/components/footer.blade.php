<footer class="mt-auto border-t border-[var(--color-outline-variant)] bg-[var(--color-primary-dark)] text-white/90">
    <div class="page-shell py-16 md:py-24">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-8">
            <!-- Branding -->
            <div class="space-y-6 lg:col-span-6">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    <div class="flex size-11 items-center justify-center rounded-xl bg-white/10 text-lg font-black text-white">
                        BS
                    </div>
                    <span class="font-display text-xl font-bold tracking-tight text-white">Bank Sampah</span>
                </a>
                <p class="max-w-md text-sm leading-relaxed text-white/70">
                    Kami membantu warga menyetor sampah terpilah, memantau nilai setoran, dan memproses penarikan saldo
                    melalui admin dengan alur yang lebih jelas dan transparan bagi komunitas.
                </p>
                <div class="flex items-center gap-4">
                    <a href="#" class="flex size-10 items-center justify-center rounded-full bg-white/5 transition-colors hover:bg-white/10">
                        <span class="sr-only">Instagram</span>
                        <svg class="size-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.778 6.98 6.978 1.28.058 1.688.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <a href="#" class="flex size-10 items-center justify-center rounded-full bg-white/5 transition-colors hover:bg-white/10">
                        <span class="sr-only">Facebook</span>
                        <svg class="size-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Links -->
            <div class="lg:col-span-3">
                <h3 class="font-display text-sm font-bold uppercase tracking-widest text-white/50">Navigasi</h3>
                <ul class="mt-6 space-y-4 text-sm font-medium">
                    <li><a href="{{ route('home') }}" class="transition-colors hover:text-[var(--color-tertiary)]">Beranda</a></li>
                    <li><a href="{{ route('services') }}" class="transition-colors hover:text-[var(--color-tertiary)]">Layanan</a></li>
                    <li><a href="{{ route('articles') }}" class="transition-colors hover:text-[var(--color-tertiary)]">Artikel</a></li>
                    <li><a href="{{ route('about') }}" class="transition-colors hover:text-[var(--color-tertiary)]">Tentang Kami</a></li>
                    <li><a href="{{ route('contact') }}" class="transition-colors hover:text-[var(--color-tertiary)]">Kontak</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="lg:col-span-3">
                <h3 class="font-display text-sm font-bold uppercase tracking-widest text-white/50">Kantor Kami</h3>
                <ul class="mt-6 space-y-4 text-sm font-medium">
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 size-5 shrink-0 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span class="text-white/70">Jl. Hijau Bersih No. 12, Bandung, Jawa Barat</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="size-5 shrink-0 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span class="text-white/70">0812-3456-7890</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="size-5 shrink-0 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 012-2V7a2 2 0 01-2-2H5a2 2 0 01-2 2v10a2 2 0 012 2z"/></svg>
                        <span class="text-white/70">halo@banksampah.id</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-16 border-t border-white/10 pt-8 text-center">
            <p class="text-xs font-medium text-white/40">
                &copy; {{ date('Y') }} Bank Sampah Indonesia. Seluruh hak cipta dilindungi.
            </p>
        </div>
    </div>
</footer>
