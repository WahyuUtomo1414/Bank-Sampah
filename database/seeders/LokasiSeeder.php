<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            [
                'nama' => 'Bank Sampah Pusat - Kota Bandung',
                'google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.573116!3d-6.903444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e639825418ad%3A0x3015760a3914490!2sBandung%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1718500000000!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'active' => true,
            ],
            [
                'nama' => 'Unit Layanan Cimahi',
                'google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31687.02636283307!2d107.525546!3d-6.885662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e438f6d2f3c7%3A0x3015760a3915000!2sCimahi%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1718500000001!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'active' => true,
            ],
        ];

        foreach ($locations as $location) {
            Lokasi::create($location);
        }
    }
}
