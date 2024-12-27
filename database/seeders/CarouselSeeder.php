<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Carousel;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Carousel::create([
            'title' => 'Khawatir lupa obat?',
            'description' => 'Cerdikin Aja!',
            'image_path' => null,
        ]);

        Carousel::create([
            'title' => 'Fitur Unggulan Kami',
            'description' => "1. Kostumisasi Notifikasi\n2. CRUD Obat yang akurat\n3. Jadwal Obat yang akurat",
            'image_path' => null,
        ]);

        Carousel::create([
            'title' => 'Ingat obat, ingat CERDIK!',
            'description' => '',
            'image_path' => null,
        ]);
    }
}
