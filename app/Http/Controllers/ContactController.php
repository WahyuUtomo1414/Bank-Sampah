<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact', [
            'hero' => [
                'eyebrow' => 'Kontak',
                'title' => 'Butuh informasi setor, jadwal layanan, atau lokasi?',
                'description' => 'Hubungi tim Bank Sampah untuk koordinasi setor, pertanyaan jenis sampah, atau kebutuhan layanan komunitas.',
            ],
            'contactInfo' => [
                'phone' => '0812-3456-7890',
                'whatsapp' => '0812-3456-7890',
                'email' => 'halo@banksampah.id',
                'address' => 'Jl. Hijau Bersih No. 12, Kota Bandung',
                'hours' => 'Senin - Sabtu, 08.00 - 16.00',
            ],
            'inquiryOptions' => [
                'Informasi setor sampah',
                'Jadwal layanan komunitas',
                'Pertanyaan tarik tunai',
                'Kerja sama lingkungan',
            ],
            'locationNote' => 'Lokasi mudah dijangkau warga sekitar dan terbuka untuk koordinasi kegiatan lingkungan skala komunitas.',
        ]);
    }
}
