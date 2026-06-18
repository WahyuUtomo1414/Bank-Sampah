<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Barang;
use App\Models\Faq;
use App\Support\ArticleViewDataBuilder;

class HomeController extends Controller
{
    public function index(ArticleViewDataBuilder $articleViewDataBuilder)
    {
        $articles = Artikel::query()
            ->with('kategori')
            ->latest('created_at')
            ->limit(6)
            ->get()
            ->map(fn (Artikel $article) => $articleViewDataBuilder->toCard($article));

        $faqs = Faq::query()
            ->latest('created_at')
            ->limit(5)
            ->get()
            ->map(fn (Faq $faq) => [
                'question' => $faq->pertanyaan,
                'answer' => $faq->jawaban,
            ]);

        $featuredWaste = Barang::query()
            ->with(['kategori', 'unit'])
            ->latest('created_at')
            ->limit(8)
            ->get()
            ->map(fn (Barang $barang) => [
                'name' => $barang->nama,
                'category' => $barang->kategori?->nama ?? 'Material',
                'description' => $barang->deskripsi ?: 'Material yang dapat dipilah dan disetor dalam kondisi bersih serta kering.',
                'price' => $barang->harga ? 'Rp' . number_format((float) $barang->harga, 0, ',', '.') : null,
                'unit' => $barang->unit?->nama,
                'imageUrl' => $barang->getPhotoUrl(),
                'hasImage' => $barang->hasPhoto(),
            ]);

        return $this->renderPublicPage('pages.home', [
            'hero' => [
                'eyebrow' => 'Solusi Cerdas Pengelolaan Sampah',
                'title' => 'Ubah Sampah Menjadi Cuan.',
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
            'featuredWaste' => $featuredWaste,
            'articles' => $articles,
            'faqs' => $faqs,
        ]);
    }
}
