<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::updateOrCreate(
            ['nama' => 'Bank Sampah'],
            [
                'logo' => 'profile/logo-bank-sampah-hijau-lestari.png',
                'alamat' => 'Jl. Lingkungan Bersih No. 21, Cimahi, Jawa Barat',
                'kontak' => [
                    'telepon' => '022-7654321',
                    'whatsapp' => '081234567890',
                    'email' => 'halo@banksampahhijaulestari.id',
                    'instagram' => '@banksampahhijaulestari',
                ],
                'visi' => 'Menjadi pusat pengelolaan sampah berbasis masyarakat yang hijau, mandiri, dan berkelanjutan.',
                'misi' => [
                    'Mendorong budaya memilah sampah dari rumah tangga.',
                    'Meningkatkan nilai ekonomi sampah melalui pengelolaan yang tertib.',
                    'Mengedukasi masyarakat tentang daur ulang dan lingkungan sehat.',
                    'Membangun kolaborasi warga, sekolah, dan komunitas peduli lingkungan.',
                ],
                'deskripsi' => 'Bank Sampah adalah inisiatif lingkungan yang membantu warga mengelola sampah dengan lebih tertib, bernilai ekonomi, dan berdampak baik bagi kebersihan lingkungan sekitar.',
            ]
        );
    }
}
