<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home', [
            'hero' => [
                'eyebrow' => 'Solusi Cerdas Pengelolaan Sampah',
                'title' => 'Ubah Sampah Jadi Nilai, Bangun Lingkungan Lebih Rapi.',
                'description' => 'Kami hadir sebagai mitra komunitas untuk mengelola sampah terpilah dengan sistem yang transparan, profesional, dan ramah warga.',
                'primaryCta' => ['label' => 'Jelajahi Layanan', 'href' => route('services')],
                'secondaryCta' => ['label' => 'Kenali Kami', 'href' => route('about')],
                'highlights' => [
                    'Pencatatan Transaksi Digital',
                    'Proses Setor Didampingi Admin',
                    'Penarikan Saldo Fleksibel',
                ],
            ],
            'stats' => [
                ['label' => 'Warga Terlayani', 'value' => '1.280+', 'description' => 'Warga aktif yang rutin memilah dan menyetor sampah.'],
                ['label' => 'Jenis Sampah', 'value' => '45+', 'description' => 'Kategori material yang diterima dan diolah kembali.'],
                ['label' => 'Setoran Terproses', 'value' => '3.500+', 'description' => 'Total transaksi setoran yang berhasil dicatat sistem.'],
                ['label' => 'Sampah Tereduksi', 'value' => '12 Ton', 'description' => 'Estimasi volume sampah yang berhasil dialihkan dari TPA.'],
            ],
            'services' => [
                [
                    'title' => 'Sistem Setor Transparan',
                    'icon' => 'scale',
                    'description' => 'Setiap sampah ditimbang secara akurat dan dicatat langsung ke buku tabungan digital Anda.',
                ],
                [
                    'title' => 'Manajemen Saldo Aman',
                    'icon' => 'banknotes',
                    'description' => 'Pantau pertumbuhan saldo Anda dan lakukan penarikan tunai melalui admin kapan saja.',
                ],
                [
                    'title' => 'Pendampingan Komunitas',
                    'icon' => 'user-group',
                    'description' => 'Kami memberikan edukasi rutin mengenai cara memilah sampah yang baik dan benar.',
                ],
            ],
            'workflow' => [
                'Pilah sampah organik dan non-organik dari rumah.',
                'Bawa sampah non-organik ke titik layanan bank sampah terdekat.',
                'Admin melakukan verifikasi jenis dan penimbangan berat sampah.',
                'Dapatkan saldo instan yang tercatat di sistem buku transaksi.',
            ],
            'featuredWaste' => [
                ['name' => 'Plastik PET', 'price' => 'Rp2.500/kg', 'category' => 'Plastik', 'icon' => 'beaker'],
                ['name' => 'Kardus Bersih', 'price' => 'Rp1.500/kg', 'category' => 'Kertas', 'icon' => 'document-text'],
                ['name' => 'Logam Campur', 'price' => 'Rp4.000/kg', 'category' => 'Logam', 'icon' => 'cube'],
            ],
            'articles' => [
                [
                    'title' => 'Panduan Memilah Sampah untuk Pemula',
                    'excerpt' => 'Bingung mulai dari mana? Baca langkah mudah memisahkan jenis sampah di rumah Anda.',
                    'date' => '15 Juni 2026',
                ],
                [
                    'title' => 'Mengapa Menabung Sampah Itu Menguntungkan?',
                    'excerpt' => 'Selain lingkungan yang bersih, tabungan sampah memberikan nilai ekonomi nyata.',
                    'date' => '12 Juni 2026',
                ],
            ],
            'faqs' => [
                [
                    'question' => 'Jenis sampah apa saja yang diterima?',
                    'answer' => 'Kami menerima berbagai jenis sampah non-organik seperti plastik, kertas, logam, dan kaca. Pastikan sampah dalam keadaan bersih dan kering.',
                ],
                [
                    'question' => 'Bagaimana cara melakukan penarikan saldo?',
                    'answer' => 'Warga dapat mendatangi admin di titik layanan pada jadwal yang ditentukan untuk melakukan penarikan tunai sesuai saldo tersedia.',
                ],
                [
                    'question' => 'Apakah ada batas minimal setoran?',
                    'answer' => 'Tidak ada batas minimal berat untuk setoran. Kami menghargai setiap usaha warga untuk mulai memilah sampah.',
                ],
                [
                    'question' => 'Dimana saya bisa melihat riwayat transaksi?',
                    'answer' => 'Saat ini seluruh riwayat transaksi dicatat oleh admin dan dapat Anda tanyakan langsung saat melakukan kunjungan setor.',
                ],
            ]
        ]);
    }
}
