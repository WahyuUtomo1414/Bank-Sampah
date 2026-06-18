<?php

namespace App\Support;

use App\Models\Profile;
use Illuminate\Support\Str;

class PublicLayoutDataBuilder
{
    public function __construct(
        protected MediaUrlResolver $mediaUrlResolver,
    ) {}

    public function build(): array
    {
        $activeProfiles = Profile::query()
            ->where('active', true)
            ->latest('id')
            ->get();

        $profile = $activeProfiles->first(fn (Profile $profile): bool => filled($profile->logo))
            ?? $activeProfiles->first();

        $kontak = $profile?->kontak ?? [];
        $brandName = $profile?->nama ?: 'Bank Sampah';
        $logoUrl = $this->mediaUrlResolver->resolve($profile?->logo);
        $initials = Str::of($brandName)
            ->explode(' ')
            ->filter()
            ->take(2)
            ->map(fn (string $word): string => Str::upper(Str::substr($word, 0, 1)))
            ->implode('') ?: 'BS';

        return [
            'navbar' => [
                'brand' => [
                    'name' => $brandName,
                    'tagline' => $profile?->visi ?: 'Hijau, rapi, dan bernilai',
                    'logoUrl' => $logoUrl,
                    'initials' => $initials,
                ],
                'navItems' => $this->getNavigationItems(),
            ],
            'footer' => [
                'brand' => [
                    'name' => $brandName,
                    'logoUrl' => $logoUrl,
                    'initials' => $initials,
                    'description' => $profile?->deskripsi ?: 'Kami membantu warga menyetor sampah terpilah, memantau nilai setoran, dan memproses penarikan saldo dengan alur yang lebih jelas.',
                ],
                'navItems' => $this->getNavigationItems(),
                'contact' => [
                    'address' => $profile?->alamat,
                    'phone' => $kontak['telepon'] ?? null,
                    'email' => $kontak['email'] ?? null,
                ],
                'socials' => collect([
                    ['name' => 'Instagram', 'url' => $kontak['instagram'] ?? null],
                    ['name' => 'Facebook', 'url' => $kontak['facebook'] ?? null],
                    ['name' => 'Twitter', 'url' => $kontak['twitter'] ?? null],
                ])->filter(fn (array $item): bool => filled($item['url']))
                    ->values()
                    ->all(),
                'copyright' => [
                    'year' => now()->year,
                    'name' => $brandName,
                ],
            ],
        ];
    }

    protected function getNavigationItems(): array
    {
        return [
            ['route' => 'home', 'label' => 'Beranda'],
            ['route' => 'services', 'label' => 'Layanan'],
            ['route' => 'articles', 'label' => 'Artikel'],
            ['route' => 'about', 'label' => 'Tentang Kami'],
            ['route' => 'contact', 'label' => 'Kontak'],
        ];
    }
}
