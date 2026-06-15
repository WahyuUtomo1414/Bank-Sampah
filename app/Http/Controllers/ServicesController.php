<?php

namespace App\Http\Controllers;

class ServicesController extends Controller
{
    public function index()
    {
        return view('pages.services', [
            'hero' => [
                'eyebrow' => 'Layanan Bank Sampah',
                'title' => 'Layanan inti yang memudahkan warga dan admin.',
                'description' => 'Semua transaksi dilakukan admin agar proses setor dan tarik tunai tetap rapi, terukur, dan mudah dipantau.',
            ],
            'services' => [
                [
                    'title' => 'Setor Sampah',
                    'description' => 'Admin memverifikasi jenis sampah, menimbang, lalu mencatat transaksi setoran ke sistem.',
                    'points' => ['Penimbangan lebih akurat', 'Estimasi nilai uang langsung terlihat', 'Riwayat transaksi lebih tertata'],
                ],
                [
                    'title' => 'Tarik Tunai',
                    'description' => 'Admin memproses permintaan penarikan saldo warga dan menampilkan ringkasan sisa saldo.',
                    'points' => ['Saldo dihitung otomatis', 'Ringkasan penarikan lebih jelas', 'Mendukung pelayanan warga lebih cepat'],
                ],
                [
                    'title' => 'Layanan Informasi',
                    'description' => 'Warga bisa melihat informasi jenis sampah, alur layanan, dan kontak untuk koordinasi setor.',
                    'points' => ['Informasi jenis sampah', 'Panduan setor', 'Kontak layanan aktif'],
                ],
            ],
            'adminFeatures' => [
                ['title' => 'Input Setor Sampah', 'description' => 'UI admin untuk mencatat transaksi setoran warga.'],
                ['title' => 'Input Tarik Tunai', 'description' => 'UI admin untuk memproses saldo yang dicairkan.'],
                ['title' => 'Ringkasan Saldo', 'description' => 'Gambaran saldo dan histori transaksi warga secara terpusat.'],
            ],
            'acceptedWaste' => [
                'Plastik botol dan gelas',
                'Kertas dan kardus',
                'Logam ringan',
                'Elektronik tertentu',
                'Karet dan campuran pilihan',
                'Barang rumah tangga yang masih bernilai',
            ],
        ]);
    }
}
