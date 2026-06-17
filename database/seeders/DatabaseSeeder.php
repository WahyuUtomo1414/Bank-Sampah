<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UnitSeeder::class,
            KategoriSeeder::class,
            BarangSeeder::class,
            WargaSeeder::class,
            FaqSeeder::class,
            ProfileSeeder::class,
            ArtikelSeeder::class,
            LokasiSeeder::class,
        ]);
    }
}
