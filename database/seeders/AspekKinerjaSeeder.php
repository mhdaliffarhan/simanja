<?php

namespace Database\Seeders;

use App\Models\AspekKinerja;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AspekKinerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['aspek_kinerja' => 'Kualitas dan Kuantitas', 'bobot' => '30'],
            ['aspek_kinerja' => 'Biaya', 'bobot' => '20'],
            ['aspek_kinerja' => 'Waktu', 'bobot' => '30'],
            ['aspek_kinerja' => 'Layanan', 'bobot' => '20'],
        ];


        foreach ($data as $item) {
            AspekKinerja::create($item);
        }
    }
}
