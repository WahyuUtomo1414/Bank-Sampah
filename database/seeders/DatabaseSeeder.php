<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::query()->updateOrCreate(
            ['email' => 'admin@banksampah.test'],
            [
                'name' => 'Admin Bank Sampah',
                'password' => 'password',
            ]
        );

        $this->call([
            UnitSeeder::class,
            KategoriSeeder::class,
            BarangSeeder::class,
            WargaSeeder::class,
            FaqSeeder::class,
            ProfileSeeder::class,
            ArtikelSeeder::class,
        ]);
    }
}
