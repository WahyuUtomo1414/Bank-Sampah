<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        return view('pages.about', [
            'hero' => [
                'eyebrow' => 'Tentang Kami',
                'title' => 'Membangun kebiasaan lingkungan yang tertib dan bernilai ekonomi.',
                'description' => 'Bank Sampah hadir untuk membantu warga mengelola sampah terpilah sekaligus membangun budaya lingkungan yang konsisten di tingkat komunitas.',
            ],
            'story' => [
                'lead' => 'Kami memadukan edukasi lingkungan, layanan komunitas, dan pencatatan transaksi yang rapi.',
                'paragraphs' => [
                    'Bank Sampah ini dibangun untuk memudahkan warga menyetor sampah terpilah tanpa proses yang membingungkan.',
                    'Seluruh transaksi dilakukan oleh admin agar perhitungan berat, estimasi nilai uang, dan saldo tetap lebih tertib dan mudah dipantau.',
                ],
            ],
            'values' => [
                ['title' => 'Transparan', 'description' => 'Nilai setoran dan penarikan dibuat jelas agar warga merasa aman.'],
                ['title' => 'Ramah Warga', 'description' => 'Alur layanan dibuat sederhana dan mudah dipahami semua kalangan.'],
                ['title' => 'Berorientasi Lingkungan', 'description' => 'Setiap layanan mendukung kebiasaan memilah sampah dari rumah.'],
            ],
            'visionMission' => [
                'vision' => 'Menjadi pusat layanan bank sampah komunitas yang modern, ramah, dan berdampak nyata.',
                'missions' => [
                    'Mendorong warga memilah sampah secara konsisten.',
                    'Menyediakan layanan setor dan tarik tunai yang tertib.',
                    'Membangun kolaborasi dengan komunitas, sekolah, dan lingkungan sekitar.',
                ],
            ],
        ]);
    }
}
