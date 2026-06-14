<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        $kategoriArtikel = Kategori::query()->where('type', 'artikel')->pluck('id', 'nama');

        $articles = [
            [
                'kategori' => 'Edukasi Sampah',
                'judul' => 'Cara Memilah Sampah Rumah Tangga dengan Benar',
                'konten' => 'Memilah sampah dari rumah adalah langkah awal yang paling penting dalam pengelolaan sampah. Pisahkan sampah organik, anorganik, dan residu agar proses daur ulang menjadi lebih mudah dan efisien.',
            ],
            [
                'kategori' => 'Daur Ulang',
                'judul' => 'Mengapa Botol Plastik Perlu Dipisahkan Sejak Awal',
                'konten' => 'Botol plastik memiliki nilai jual dan potensi daur ulang yang tinggi. Jika dipisahkan sejak awal, kualitas material tetap terjaga dan proses pengolahannya menjadi lebih efektif.',
            ],
            [
                'kategori' => 'Lingkungan',
                'judul' => 'Dampak Sampah Plastik terhadap Saluran Air dan Banjir',
                'konten' => 'Sampah plastik yang dibuang sembarangan dapat menyumbat saluran air dan memperparah risiko banjir. Kebiasaan memilah dan menyetor sampah membantu mengurangi masalah ini.',
            ],
            [
                'kategori' => 'Edukasi Sampah',
                'judul' => 'Perbedaan Sampah Organik, Anorganik, dan Residu',
                'konten' => 'Memahami jenis sampah membantu warga mengelola limbah rumah tangga secara tepat. Sampah organik dapat diolah menjadi kompos, anorganik bisa didaur ulang, sedangkan residu perlu penanganan khusus.',
            ],
            [
                'kategori' => 'Daur Ulang',
                'judul' => 'Kaleng dan Logam Bekas Masih Punya Nilai Ekonomi',
                'konten' => 'Banyak warga belum menyadari bahwa kaleng minuman dan logam bekas memiliki harga jual. Bila dikumpulkan secara konsisten, hasilnya bisa menambah saldo tabungan di Bank Sampah.',
            ],
            [
                'kategori' => 'Lingkungan',
                'judul' => 'Bank Sampah sebagai Gerakan Warga untuk Lingkungan Bersih',
                'konten' => 'Bank Sampah bukan hanya tempat setor sampah, tetapi juga ruang kolaborasi warga. Kegiatan ini memperkuat kepedulian lingkungan sekaligus membangun kebiasaan baik secara bersama-sama.',
            ],
            [
                'kategori' => 'Edukasi Sampah',
                'judul' => 'Tips Menyimpan Sampah Anorganik Agar Tetap Layak Jual',
                'konten' => 'Sampah anorganik sebaiknya dibersihkan, dikeringkan, dan disimpan terpisah sesuai jenisnya. Cara ini membantu menjaga kualitas material dan memudahkan proses penimbangan di Bank Sampah.',
            ],
            [
                'kategori' => 'Daur Ulang',
                'judul' => 'Kertas dan Kardus Bekas Bisa Jadi Sumber Penghasilan Tambahan',
                'konten' => 'Kertas dan kardus yang disimpan dalam kondisi kering memiliki nilai jual yang stabil. Rumah tangga, sekolah, dan kantor bisa ikut berkontribusi dengan mengumpulkan material ini secara rutin.',
            ],
            [
                'kategori' => 'Lingkungan',
                'judul' => 'Edukasi Anak tentang Sampah Bisa Dimulai dari Rumah',
                'konten' => 'Anak-anak dapat belajar peduli lingkungan lewat kebiasaan kecil seperti membuang sampah pada tempatnya dan memilah sampah bersama keluarga. Pendidikan sederhana ini memberi dampak jangka panjang.',
            ],
            [
                'kategori' => 'Edukasi Sampah',
                'judul' => 'Langkah Sederhana Memulai Kebiasaan Setor Sampah Mingguan',
                'konten' => 'Mulailah dengan menyediakan wadah terpisah di rumah, tentukan jadwal pemilahan, lalu kumpulkan sampah bernilai jual setiap minggu. Konsistensi adalah kunci agar kebiasaan ini bertahan lama.',
            ],
        ];

        foreach ($articles as $index => $article) {
            $slug = Str::slug($article['judul']);

            Artikel::updateOrCreate(
                ['slug' => $slug],
                [
                    'kategori_id' => $kategoriArtikel[$article['kategori']],
                    'judul' => $article['judul'],
                    'konten' => $article['konten'],
                    'thumbnail' => 'artikel/thumbnail-' . ($index + 1) . '.jpg',
                    'foto' => 'artikel/foto-' . ($index + 1) . '.jpg',
                ]
            );
        }
    }
}
