<?php

namespace Database\Seeders;

use App\Models\Metodepembayaran;
use Illuminate\Database\Seeder;

class MetodePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bri = Metodepembayaran::create([
            'nama_method' => 'Transfer Bank',
            'nama_provider' => 'BANK BRI',
            'nama_rekening' => 'LEMBAGA PENGEMBANGAN DAN KONSULTASI NASIONAL',
            'nomor_rekening' => '213501000250301'
        ]);

        $mandiri = Metodepembayaran::create([
            'nama_method' => 'Transfer Bank',
            'nama_provider' => 'BANK MANDIRI',
            'nama_rekening' => 'LEMBAGA PENGEMBANGAN DAN KONSULTASI NASIONAL',
            'nomor_rekening' => '0060010942294'
        ]);
    }
}
