<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama' => 'Plastik', 'type' => 'barang', 'deskripsi' => 'Kategori sampah plastik yang dapat dipilah dan didaur ulang.'],
            ['nama' => 'Kertas', 'type' => 'barang', 'deskripsi' => 'Kategori sampah berbahan kertas, kardus, dan sejenisnya.'],
            ['nama' => 'Logam', 'type' => 'barang', 'deskripsi' => 'Kategori sampah logam seperti kaleng, aluminium, dan besi ringan.'],
            ['nama' => 'Elektronik', 'type' => 'barang', 'deskripsi' => 'Kategori barang elektronik bekas atau rusak.'],
            ['nama' => 'Karet dan Campuran', 'type' => 'barang', 'deskripsi' => 'Kategori barang campuran seperti sepatu, selang, dan bahan sejenis.'],
            ['nama' => 'Cairan', 'type' => 'barang', 'deskripsi' => 'Kategori cairan yang masih memiliki nilai jual seperti minyak jelantah.'],
            ['nama' => 'Edukasi Sampah', 'type' => 'artikel', 'deskripsi' => 'Kategori artikel edukasi seputar pemilahan dan pengelolaan sampah.'],
            ['nama' => 'Daur Ulang', 'type' => 'artikel', 'deskripsi' => 'Kategori artikel tentang proses dan manfaat daur ulang.'],
            ['nama' => 'Lingkungan', 'type' => 'artikel', 'deskripsi' => 'Kategori artikel tentang dampak sampah pada lingkungan dan masyarakat.'],
        ];

        foreach ($categories as $category) {
            Kategori::updateOrCreate(
                ['nama' => $category['nama'], 'type' => $category['type']],
                $category
            );
        }
    }
}
