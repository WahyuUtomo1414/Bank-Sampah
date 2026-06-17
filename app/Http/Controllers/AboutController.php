<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $profile = \App\Models\Profile::query()->where('active', true)->first();

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
                'title' => $profile->nama ?? 'Membangun Ekosistem Lingkungan yang Bernilai.',
                'description' => $profile->deskripsi ?? 'Kami hadir sebagai jembatan bagi warga untuk mengelola sampah dengan cara yang modern, transparan, dan memberikan dampak ekonomi nyata bagi komunitas.',
            ],
            'story' => [
                'lead' => 'Komitmen kami dalam menjaga kelestarian lingkungan.',
                'paragraphs' => [
                    $profile->deskripsi ?? 'Kami menyadari bahwa pemilahan sampah adalah kunci utama dalam pelestarian lingkungan. Namun, tanpa sistem yang memudahkan, kebiasaan ini sulit untuk konsisten dijalankan oleh masyarakat luas.',
                    'Melalui Bank Sampah ini, kami mengintegrasikan teknologi pencatatan digital dengan layanan komunitas yang hangat. Admin kami siap mendampingi setiap langkah Anda.',
                ],
            ],
            'visionMission' => [
                'vision' => $profile->visi ?? 'Menjadi pusat pemberdayaan lingkungan berbasis komunitas yang paling terpercaya dan inovatif di Indonesia.',
                'missions' => $profile->misi ?? [
                    'Mengedukasi masyarakat tentang pentingnya pemilahan sampah dari rumah.',
                    'Menyediakan platform tabungan sampah yang transparan dan mudah diakses.',
                    'Menciptakan nilai ekonomi tambahan bagi warga melalui pengelolaan sampah terpadu.',
                ],
            ],
            'locations' => $locations,
        ]);
    }
}
