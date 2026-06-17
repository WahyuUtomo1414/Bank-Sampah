<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $locations = \App\Models\Lokasi::query()
            ->where('active', true)
            ->get()
            ->map(function ($location) {
                return [
                    'nama' => $location->nama,
                    'google_maps' => $location->google_maps,
                ];
            })
            ->all();

        return view('pages.about', [
            'hero' => [
                'eyebrow' => 'Tentang Kami',
                'title' => 'Membangun Ekosistem Lingkungan yang Bernilai.',
                'description' => 'Kami hadir sebagai jembatan bagi warga untuk mengelola sampah dengan cara yang modern, transparan, dan memberikan dampak ekonomi nyata bagi komunitas.',
            ],
            'story' => [
                'lead' => 'Berawal dari kepedulian terhadap tumpukan sampah yang tidak terkelola.',
                'paragraphs' => [
                    'Kami menyadari bahwa pemilahan sampah adalah kunci utama dalam pelestarian lingkungan. Namun, tanpa sistem yang memudahkan, kebiasaan ini sulit untuk konsisten dijalankan oleh masyarakat luas.',
                    'Melalui Bank Sampah ini, kami mengintegrasikan teknologi pencatatan digital dengan layanan komunitas yang hangat. Admin kami siap mendampingi setiap langkah Anda, mulai dari penimbangan hingga pengelolaan saldo tabungan sampah.',
                ],
            ],
            'visionMission' => [
                'vision' => 'Menjadi pusat pemberdayaan lingkungan berbasis komunitas yang paling terpercaya dan inovatif di Indonesia.',
                'missions' => [
                    'Mengedukasi masyarakat tentang pentingnya pemilahan sampah dari rumah.',
                    'Menyediakan platform tabungan sampah yang transparan dan mudah diakses.',
                    'Menciptakan nilai ekonomi tambahan bagi warga melalui pengelolaan sampah terpadu.',
                    'Berkolaborasi dengan berbagai pihak untuk memperluas dampak positif bagi lingkungan.'
                ],
            ],
            'locations' => $locations,
        ]);
    }
}
