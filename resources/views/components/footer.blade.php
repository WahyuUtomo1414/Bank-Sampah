<footer class="mt-16 border-t border-[var(--color-line)] bg-[var(--color-primary-dark)] text-white">
    <div class="page-shell py-12">
        <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-4">
            <div class="space-y-4 lg:col-span-2">
                <div class="flex items-center gap-3">
                    <span class="flex size-11 items-center justify-center rounded-2xl bg-white/15 text-lg font-extrabold">BS</span>
                    <div>
                        <p class="font-display text-lg font-bold">Bank Sampah</p>
                        <p class="text-sm text-white/70">Layanan komunitas yang ramah, tertib, dan berdampak.</p>
                    </div>
                </div>
                <p class="max-w-xl text-sm leading-6 text-white/78">
                    Kami membantu warga menyetor sampah terpilah, memantau nilai setoran, dan memproses penarikan saldo
                    melalui admin dengan alur yang lebih jelas.
                </p>
            </div>

            <div>
                <h3 class="font-display text-base font-semibold">Navigasi</h3>
                <ul class="mt-4 space-y-3 text-sm text-white/78">
                    <li><a href="{{ route('home') }}" class="hover:text-white">Beranda</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-white">Layanan</a></li>
                    <li><a href="{{ route('articles') }}" class="hover:text-white">Artikel</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white">Tentang Kami</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-display text-base font-semibold">Hubungi Kami</h3>
                <ul class="mt-4 space-y-3 text-sm text-white/78">
                    <li>Jl. Hijau Bersih No. 12, Bandung</li>
                    <li>0812-3456-7890</li>
                    <li>halo@banksampah.id</li>
                    <li>Senin - Sabtu, 08.00 - 16.00</li>
                </ul>
            </div>
        </div>
    </div>
</footer>
