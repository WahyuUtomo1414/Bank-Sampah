<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        $units = [
            ['nama' => 'kg', 'deskripsi' => 'Satuan berat kilogram untuk sampah dan barang daur ulang.'],
            ['nama' => 'unit', 'deskripsi' => 'Satuan per item untuk barang yang dihitung per buah.'],
            ['nama' => 'buah', 'deskripsi' => 'Satuan per buah untuk item tertentu seperti galon.'],
            ['nama' => 'botol', 'deskripsi' => 'Satuan per botol untuk kemasan kaca tertentu.'],
            ['nama' => 'meter', 'deskripsi' => 'Satuan panjang untuk material tertentu seperti kabel atau gulungan.'],
        ];

        foreach ($units as $unit) {
            Unit::updateOrCreate(
                ['nama' => $unit['nama']],
                $unit
            );
        }
    }
}
