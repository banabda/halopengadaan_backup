<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bidangs = [
            'barang',
            'jasa konstruksi',
            'konsultasi non konstruksi',
            'swakelola',
            'jasa lainnya',
            'perencanaan',
            'pemilihan',
            'pelaksanaan kontrak',
        ];
        Bidang::truncate();
        foreach ($bidangs as $bidang) {
            Bidang::updateOrCreate(['name' => $bidang]);
        }
    }
}
