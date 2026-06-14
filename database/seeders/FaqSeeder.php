<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'pertanyaan' => 'Apa itu Bank Sampah?',
                'jawaban' => 'Bank Sampah adalah sistem pengelolaan sampah berbasis masyarakat yang mendorong warga memilah sampah dan menukarkannya menjadi nilai ekonomi.',
            ],
            [
                'pertanyaan' => 'Jenis sampah apa saja yang bisa disetor?',
                'jawaban' => 'Umumnya Bank Sampah menerima sampah anorganik yang bernilai jual seperti plastik, kertas, kardus, kaleng, dan logam tertentu yang sudah dipilah.',
            ],
            [
                'pertanyaan' => 'Apakah sampah harus dicuci dulu sebelum disetor?',
                'jawaban' => 'Sebaiknya iya. Sampah yang bersih dan kering lebih mudah dipilah, tidak menimbulkan bau, dan memiliki kualitas jual yang lebih baik.',
            ],
            [
                'pertanyaan' => 'Bagaimana cara menjadi nasabah Bank Sampah?',
                'jawaban' => 'Warga cukup mendaftar melalui pengelola Bank Sampah, lalu data dasar dicatat agar transaksi setor dan saldo bisa dipantau dengan rapi.',
            ],
            [
                'pertanyaan' => 'Apakah hasil setor sampah bisa diuangkan?',
                'jawaban' => 'Bisa. Nilai hasil setor biasanya dicatat sebagai saldo nasabah dan dapat ditarik sesuai ketentuan pengelola Bank Sampah.',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['pertanyaan' => $faq['pertanyaan']],
                $faq
            );
        }
    }
}
