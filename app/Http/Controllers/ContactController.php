<?php

namespace App\Http\Controllers;

use App\Models\Profile;

class ContactController extends Controller
{
    public function index()
    {
        $profile = Profile::query()
            ->where('active', true)
            ->latest('id')
            ->first();
        $kontak = $profile?->kontak ?? [];

        return $this->renderPublicPage('pages.contact', [
            'hero' => [
                'eyebrow' => 'Kontak Kami',
                'title' => $profile?->nama,
                'description' => $profile?->deskripsi,
            ],
            'contactInfo' => [
                'phone' => $kontak['telepon'] ?? null,
                'whatsapp' => filled($kontak['whatsapp'] ?? null)
                    ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $kontak['whatsapp'])
                    : null,
                'email' => $kontak['email'] ?? null,
                'address' => $profile?->alamat,
            ],
            'socials' => collect([
                ['name' => 'Instagram', 'url' => $kontak['instagram'] ?? null, 'icon' => 'instagram'],
                ['name' => 'Facebook', 'url' => $kontak['facebook'] ?? null, 'icon' => 'facebook'],
                ['name' => 'Twitter', 'url' => $kontak['twitter'] ?? null, 'icon' => 'twitter'],
            ])->filter(fn (array $social): bool => filled($social['url']))
                ->values()
                ->all(),
        ]);
    }
}
