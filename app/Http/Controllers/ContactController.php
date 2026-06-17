<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        $profile = \App\Models\Profile::query()->where('active', true)->first();
        $kontak = $profile->kontak ?? [];

        return view('pages.contact', [
            'hero' => [
                'eyebrow' => 'Kontak Kami',
                'title' => 'Kami Siap Membantu Anda.',
                'description' => 'Punya pertanyaan tentang jenis sampah, jadwal setor, atau ingin memulai kerja sama lingkungan? Hubungi tim kami melalui saluran di bawah ini.',
            ],
            'contactInfo' => [
                'phone' => $kontak['telepon'] ?? '0812-3456-7890',
                'whatsapp' => isset($kontak['whatsapp']) ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $kontak['whatsapp']) : 'https://wa.me/6281234567890',
                'email' => $kontak['email'] ?? 'halo@banksampah.id',
                'address' => $profile->alamat ?? 'Jl. Hijau Bersih No. 12, Kota Bandung, Jawa Barat 40262',
                'hours' => $kontak['jam_layanan'] ?? 'Senin - Sabtu: 08.00 - 16.00 WIB',
            ],
            'socials' => [
                ['name' => 'Instagram', 'url' => $kontak['instagram'] ?? 'https://instagram.com/banksampah', 'icon' => 'instagram'],
                ['name' => 'Facebook', 'url' => $kontak['facebook'] ?? 'https://facebook.com/banksampah', 'icon' => 'facebook'],
                ['name' => 'Twitter', 'url' => $kontak['twitter'] ?? 'https://twitter.com/banksampah', 'icon' => 'twitter'],
            ]
        ]);
    }
}
