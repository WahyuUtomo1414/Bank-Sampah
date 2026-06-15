<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home', [
            'hero' => [
                'eyebrow' => 'Bank Sampah untuk Warga',
                'title' => 'Kelola sampah terpilah jadi lebih bernilai dan tertata.',
                'description' => 'Bank Sampah membantu warga menyetor sampah terpilah melalui proses yang rapi, transparan, dan didampingi admin secara langsung.',
                'primaryCta' => ['label' => 'Lihat Layanan', 'href' => route('services')],
                'secondaryCta' => ['label' => 'Hubungi Kami', 'href' => route('contact')],
                'highlights' => [
                    'Setor sampah ditangani admin',
                    'Estimasi nilai uang lebih jelas',
                    'Alur ramah warga dan komunitas',
                ],
            ],
            'stats' => [
                ['label' => 'Warga Terlayani', 'value' => '1.280+', 'description' => 'Warga aktif yang rutin menyetor sampah.'],
                ['label' => 'Jenis Sampah', 'value' => '45+', 'description' => 'Kategori sampah terpilah yang diterima.'],
                ['label' => 'Transaksi Bulanan', 'value' => '320+', 'description' => 'Setoran dan penarikan yang diproses admin.'],
                ['label' => 'Mitra Lingkungan', 'value' => '18', 'description' => 'Kolaborasi sekolah, RT, dan komunitas.'],
            ],
            'services' => [
                [
                    'title' => 'Setor Sampah',
                    'description' => 'Admin menimbang, mencatat, dan menghitung estimasi nilai sampah yang disetor warga.',
                ],
                [
                    'title' => 'Tarik Tunai',
                    'description' => 'Saldo hasil setoran bisa diproses admin menjadi penarikan tunai yang tercatat rapi.',
                ],
                [
                    'title' => 'Edukasi Pemilahan',
                    'description' => 'Warga mendapat panduan jenis sampah yang diterima agar proses setor lebih cepat.',
                ],
            ],
            'workflow' => [
                'Warga datang membawa sampah yang sudah dipilah.',
                'Admin memeriksa, menimbang, dan memasukkan transaksi setor.',
                'Sistem menampilkan estimasi nilai uang dari sampah.',
                'Saldo warga bertambah dan bisa ditarik melalui admin.',
            ],
            'featuredWaste' => [
                ['name' => 'Botol Plastik', 'price' => 'Rp2.000/kg', 'category' => 'Plastik'],
                ['name' => 'Kardus', 'price' => 'Rp1.000/kg', 'category' => 'Kertas'],
                ['name' => 'Kaleng', 'price' => 'Rp3.500/kg', 'category' => 'Logam'],
            ],
            'articles' => [
                [
                    'title' => 'Cara memilah sampah rumah tangga tanpa ribet',
                    'excerpt' => 'Langkah sederhana agar sampah plastik, kertas, dan logam lebih mudah disetor.',
                ],
                [
                    'title' => 'Kenapa saldo bank sampah penting untuk warga',
                    'excerpt' => 'Setoran kecil yang konsisten bisa menjadi nilai ekonomi dan kebiasaan baik.',
                ],
                [
                    'title' => 'Komunitas hijau dimulai dari lingkungan terdekat',
                    'excerpt' => 'Kolaborasi RT, sekolah, dan keluarga membuat pengelolaan sampah lebih efektif.',
                ],
            ],
        ]);
    }
}
