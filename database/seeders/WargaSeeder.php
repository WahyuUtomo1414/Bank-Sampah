<?php

namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Seeder;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        $warga = [
            ['nama' => 'Budi Santoso', 'no_tlpn' => '081234567801', 'alamat' => 'Jl. Melati No. 12, Bandung'],
            ['nama' => 'Siti Aminah', 'no_tlpn' => '081234567802', 'alamat' => 'Jl. Kenanga No. 5, Yogyakarta'],
            ['nama' => 'Andi Pratama', 'no_tlpn' => '081234567803', 'alamat' => 'Jl. Mawar No. 18, Surabaya'],
            ['nama' => 'Dewi Lestari', 'no_tlpn' => '081234567804', 'alamat' => 'Jl. Flamboyan No. 7, Malang'],
            ['nama' => 'Rizky Maulana', 'no_tlpn' => '081234567805', 'alamat' => 'Jl. Anggrek No. 22, Bogor'],
            ['nama' => 'Nur Aisyah', 'no_tlpn' => '081234567806', 'alamat' => 'Jl. Cempaka No. 10, Depok'],
            ['nama' => 'Agus Setiawan', 'no_tlpn' => '081234567807', 'alamat' => 'Jl. Merpati No. 3, Semarang'],
            ['nama' => 'Lina Marlina', 'no_tlpn' => '081234567808', 'alamat' => 'Jl. Pahlawan No. 15, Solo'],
            ['nama' => 'Fajar Hidayat', 'no_tlpn' => '081234567809', 'alamat' => 'Jl. Sawo No. 9, Bekasi'],
            ['nama' => 'Putri Ramadhani', 'no_tlpn' => '081234567810', 'alamat' => 'Jl. Teratai No. 4, Tangerang'],
        ];

        foreach ($warga as $item) {
            Warga::updateOrCreate(
                ['no_tlpn' => $item['no_tlpn']],
                $item
            );
        }
    }
}
