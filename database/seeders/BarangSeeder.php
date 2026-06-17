<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $kategoriBarang = Kategori::query()->where('type', 'barang')->pluck('id', 'nama');
        $units = Unit::query()->pluck('id', 'nama');

        $items = [
            [
                'kategori' => 'Plastik',
                'kode' => '1A',
                'unit' => 'kg',
                'nama' => 'BOTOL MINUMAN PLASTIK A',
                'foto' => 'barang/botol-minuman-plastik-a.jpg',
                'harga' => 2000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Plastik',
                'kode' => '1B',
                'unit' => 'kg',
                'nama' => 'BOTOL MINUMAN PLASTIK B',
                'foto' => 'barang/botol-minuman-plastik-b.jpg',
                'harga' => 1000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Kertas',
                'kode' => '2',
                'unit' => 'kg',
                'nama' => 'KARDUS',
                'foto' => 'barang/kardus.jpg',
                'harga' => 1000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Kertas',
                'kode' => '3A',
                'unit' => 'kg',
                'nama' => 'HVS',
                'foto' => 'barang/hvs.jpg',
                'harga' => 800,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Kertas',
                'kode' => '3B',
                'unit' => 'kg',
                'nama' => 'BUKU C',
                'foto' => 'barang/buku-c.jpg',
                'harga' => 1200,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Kertas',
                'kode' => '3C',
                'unit' => 'kg',
                'nama' => 'BURUM',
                'foto' => 'barang/burum.jpg',
                'harga' => 1000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Kertas',
                'kode' => '3D',
                'unit' => 'kg',
                'nama' => 'SAMPUL BUKU (DUPLEX)',
                'foto' => 'barang/sampul-buku-duplex.jpg',
                'harga' => 200,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Plastik',
                'kode' => '4',
                'unit' => 'kg',
                'nama' => 'EMBER (PP) C',
                'foto' => 'barang/ember-pp-c.jpg',
                'harga' => 1200,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Plastik',
                'kode' => '5A',
                'unit' => 'kg',
                'nama' => 'GELAS (PP) A',
                'foto' => 'barang/gelas-pp-a.jpg',
                'harga' => 3000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Plastik',
                'kode' => '5B',
                'unit' => 'kg',
                'nama' => 'GELAS (PP) B',
                'foto' => 'barang/gelas-pp-b.jpg',
                'harga' => 1000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Plastik',
                'kode' => '6',
                'unit' => 'kg',
                'nama' => 'BOTOL OLI (HD) A',
                'foto' => 'barang/botol-oli-hd-a.jpg',
                'harga' => 1500,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Plastik',
                'kode' => '7',
                'unit' => 'kg',
                'nama' => 'TUTUP GALON ISI ULANG (LD)',
                'foto' => 'barang/tutup-galon-isi-ulang-ld.jpg',
                'harga' => 2000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Plastik',
                'kode' => '8',
                'unit' => 'buah',
                'nama' => 'GALON ISI ULANG (PC)',
                'foto' => 'barang/galon-isi-ulang-pc.jpg',
                'harga' => 2000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Elektronik',
                'kode' => '9',
                'unit' => 'kg',
                'nama' => 'KERASAN / ELEKTRONIK',
                'foto' => 'barang/kerasan-elektronik.jpg',
                'harga' => 700,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Karet dan Campuran',
                'kode' => '10A',
                'unit' => 'kg',
                'nama' => 'SEPATU BOOT/SELANG AIR',
                'foto' => 'barang/sepatu-boot-selang-air.jpg',
                'harga' => 1000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Karet dan Campuran',
                'kode' => '10B',
                'unit' => 'kg',
                'nama' => 'SEPATU GEMBOSAN',
                'foto' => 'barang/sepatu-gembosan.jpg',
                'harga' => 500,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Elektronik',
                'kode' => '11',
                'unit' => 'unit',
                'nama' => 'KULKAS',
                'foto' => 'barang/kulkas.jpg',
                'harga' => 50000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Elektronik',
                'kode' => '12',
                'unit' => 'unit',
                'nama' => 'HP RUSAK',
                'foto' => 'barang/hp-rusak.jpg',
                'harga' => 3500,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Elektronik',
                'kode' => '13',
                'unit' => 'unit',
                'nama' => 'AKI BEKAS MOTOR',
                'foto' => 'barang/aki-bekas-motor.jpg',
                'harga' => 8500,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Logam',
                'kode' => '14A',
                'unit' => 'kg',
                'nama' => 'BESI/DRUM (Besi A)',
                'foto' => 'barang/besi-drum-besi-a-14a.jpg',
                'harga' => 3000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Logam',
                'kode' => '14B',
                'unit' => 'kg',
                'nama' => 'BESI/DRUM (Besi A)',
                'foto' => 'barang/besi-drum-besi-a-14b.jpg',
                'harga' => 2500,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Logam',
                'kode' => '15',
                'unit' => 'kg',
                'nama' => 'TEMBAGA',
                'foto' => 'barang/tembaga.jpg',
                'harga' => 80000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Logam',
                'kode' => '16',
                'unit' => 'kg',
                'nama' => 'KUNINGAN',
                'foto' => 'barang/kuningan.jpg',
                'harga' => 50000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Logam',
                'kode' => '17',
                'unit' => 'kg',
                'nama' => 'ALUMUNIUM A',
                'foto' => 'barang/alumunium-a.jpg',
                'harga' => 12000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Logam',
                'kode' => '18',
                'unit' => 'kg',
                'nama' => 'ALUMUNIUM B (SPRITE,',
                'foto' => 'barang/alumunium-b-sprite.jpg',
                'harga' => 10000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Logam',
                'kode' => '19',
                'unit' => 'kg',
                'nama' => 'MONEL/STAINLESS',
                'foto' => 'barang/monel-stainless.jpg',
                'harga' => 3500,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Logam',
                'kode' => '20',
                'unit' => 'kg',
                'nama' => 'KALENG',
                'foto' => 'barang/kaleng.jpg',
                'harga' => 1000,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Cairan',
                'kode' => '21',
                'unit' => 'kg',
                'nama' => 'MINYAK JELANTAH',
                'foto' => 'barang/minyak-jelantah.jpg',
                'harga' => 1100,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Plastik',
                'kode' => '22',
                'unit' => 'botol',
                'nama' => 'BOTOL BIR',
                'foto' => 'barang/botol-bir.jpg',
                'harga' => 300,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
            [
                'kategori' => 'Elektronik',
                'kode' => '23',
                'unit' => 'unit',
                'nama' => 'ELEKTRONIK',
                'foto' => 'barang/elektronik.jpg',
                'harga' => null,
                'deskripsi' => 'Data harga rosok Bank Sampah Induk Bukit HIBUL tahun 2026.',
            ],
        ];

        foreach ($items as &$item) {
            $item['deskripsi'] = null;
        }
        unset($item);

        foreach ($items as $item) {
            Barang::updateOrCreate(
                ['kode' => $item['kode']],
                [
                    'kategori_id' => $kategoriBarang[$item['kategori']],
                    'unit_id' => $units[$item['unit']],
                    'kode' => $item['kode'],
                    'nama' => $item['nama'],
                    'foto' => $item['foto'],
                    'harga' => $item['harga'],
                    'deskripsi' => $item['deskripsi'],
                ]
            );
        }
    }
}
