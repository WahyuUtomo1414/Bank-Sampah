<?php

namespace App\Http\Controllers;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('pages.articles', [
            'hero' => [
                'eyebrow' => 'Artikel Edukasi',
                'title' => 'Wawasan praktis seputar sampah, lingkungan, dan kebiasaan baik warga.',
                'description' => 'Halaman artikel membantu warga memahami cara memilah sampah, manfaat bank sampah, dan langkah kecil yang berdampak untuk lingkungan sekitar.',
            ],
            'featuredArticle' => [
                'category' => 'Edukasi Rumah Tangga',
                'title' => 'Cara memulai pemilahan sampah dari rumah tanpa membuat aktivitas harian terasa rumit.',
                'excerpt' => 'Mulai dari memisahkan plastik, kertas, dan logam dalam wadah sederhana agar proses setor ke bank sampah menjadi lebih cepat dan bernilai.',
                'meta' => '12 Juni 2026 • 5 menit baca',
            ],
            'categories' => ['Semua', 'Edukasi', 'Komunitas', 'Tips Setor', 'Lingkungan'],
            'articles' => [
                [
                    'category' => 'Tips Setor',
                    'title' => 'Supaya setoran lebih cepat, kenali jenis sampah yang paling sering diterima.',
                    'excerpt' => 'Panduan singkat untuk warga agar tidak bingung saat membawa sampah ke titik layanan.',
                    'meta' => '10 Juni 2026 • 4 menit baca',
                ],
                [
                    'category' => 'Komunitas',
                    'title' => 'Peran RT dan sekolah dalam membangun kebiasaan memilah sampah bersama.',
                    'excerpt' => 'Kolaborasi sederhana bisa membantu volume sampah tercatat dan lebih mudah dikelola.',
                    'meta' => '8 Juni 2026 • 6 menit baca',
                ],
                [
                    'category' => 'Edukasi',
                    'title' => 'Kenapa bank sampah bukan cuma soal uang, tetapi juga soal pola hidup yang lebih tertib.',
                    'excerpt' => 'Nilai ekonomi penting, tetapi perubahan perilaku lingkungan jauh lebih berdampak dalam jangka panjang.',
                    'meta' => '5 Juni 2026 • 5 menit baca',
                ],
                [
                    'category' => 'Lingkungan',
                    'title' => 'Mengurangi sampah campur dari rumah dimulai dari kebiasaan kecil yang konsisten.',
                    'excerpt' => 'Fokus pada rutinitas yang realistis agar seluruh anggota keluarga bisa ikut terlibat.',
                    'meta' => '2 Juni 2026 • 4 menit baca',
                ],
                [
                    'category' => 'Tips Setor',
                    'title' => 'Apa yang perlu disiapkan sebelum datang setor sampah ke layanan bank sampah?',
                    'excerpt' => 'Daftar cepat barang, kondisi sampah, dan cara membawa setoran agar proses admin lebih efisien.',
                    'meta' => '30 Mei 2026 • 3 menit baca',
                ],
                [
                    'category' => 'Komunitas',
                    'title' => 'Kegiatan lingkungan berbasis warga lebih efektif jika data setoran tertib dan mudah dipantau.',
                    'excerpt' => 'Administrasi yang rapi membantu komunitas melihat perkembangan kebiasaan memilah sampah.',
                    'meta' => '28 Mei 2026 • 5 menit baca',
                ],
            ],
        ]);
    }
}
