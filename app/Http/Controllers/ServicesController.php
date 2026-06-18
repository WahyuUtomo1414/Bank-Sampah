<?php

namespace App\Http\Controllers;

class ServicesController extends Controller
{
    public function index()
    {
        return $this->renderPublicPage('pages.services', [
            'hero' => [
                'eyebrow' => 'Layanan Bank Sampah',
                'title' => 'Solusi Praktis Kelola Sampah Komunitas.',
                'description' => 'Kami menyediakan sistem pengelolaan sampah terintegrasi yang memudahkan warga untuk menabung sampah dan mendapatkan nilai ekonomi secara transparan.',
            ],
            'services' => [
                [
                    'title' => 'Setor Sampah',
                    'icon' => 'scale',
                    'description' => 'Setorkan sampah terpilah Anda. Admin akan melakukan verifikasi, penimbangan, dan pencatatan saldo secara instan.',
                    'points' => ['Penimbangan Digital Akurat', 'Input Saldo Real-time', 'Validasi Jenis Sampah'],
                ],
                [
                    'title' => 'Tarik Saldo',
                    'icon' => 'banknotes',
                    'description' => 'Cairkan tabungan sampah Anda kapan saja melalui admin di titik layanan sesuai dengan saldo yang tersedia.',
                    'points' => ['Proses Cepat & Mudah', 'Tanpa Biaya Admin', 'Histori Penarikan Jelas'],
                ],
                [
                    'title' => 'Edukasi Pemilahan',
                    'icon' => 'info',
                    'description' => 'Dapatkan informasi lengkap mengenai cara memilah sampah yang benar untuk memaksimalkan nilai tabungan Anda.',
                    'points' => ['Panduan Jenis Sampah', 'Tips Memilah di Rumah', 'Konsultasi Layanan'],
                ],
            ],
            'adminFeatures' => [
                ['title' => 'Pencatatan Digital', 'description' => 'Setiap gram sampah Anda dicatat dalam sistem buku transaksi digital yang aman.'],
                ['title' => 'Manajemen Nasabah', 'description' => 'Admin membantu warga mengelola akun dan memantau pertumbuhan saldo tabungan.'],
                ['title' => 'Transparansi Harga', 'description' => 'Harga beli sampah selalu diperbarui mengikuti harga pasar yang berlaku secara adil.'],
            ],
            'acceptedWaste' => [
                'Botol & Gelas Plastik',
                'Kertas, Koran & Kardus',
                'Logam & Kaleng Aluminium',
                'Peralatan Elektronik Bekas',
                'Botol Kaca & Pecah Belah',
                'Minyak Jelantah & Organik'
            ],
        ]);
    }
}
