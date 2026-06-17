<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact', [
            'hero' => [
                'eyebrow' => 'Kontak Kami',
                'title' => 'Kami Siap Membantu Anda.',
                'description' => 'Punya pertanyaan tentang jenis sampah, jadwal setor, atau ingin memulai kerja sama lingkungan? Hubungi tim kami melalui saluran di bawah ini.',
            ],
            'contactInfo' => [
                'phone' => '0812-3456-7890',
                'whatsapp' => 'https://wa.me/6281234567890',
                'email' => 'halo@banksampah.id',
                'address' => 'Jl. Hijau Bersih No. 12, Kota Bandung, Jawa Barat 40262',
                'hours' => 'Senin - Sabtu: 08.00 - 16.00 WIB',
            ],
            'socials' => [
                ['name' => 'Instagram', 'url' => 'https://instagram.com/banksampah', 'icon' => 'instagram'],
                ['name' => 'Facebook', 'url' => 'https://facebook.com/banksampah', 'icon' => 'facebook'],
                ['name' => 'Twitter', 'url' => 'https://twitter.com/banksampah', 'icon' => 'twitter'],
            ]
        ]);
    }
}
