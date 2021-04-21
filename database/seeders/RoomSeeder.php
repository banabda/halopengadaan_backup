<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bidangs = [
            'barang room ',
            'jasa konstruksi room ',
            'konsultasi non konstruksi room ',
            'swakelola room ',
            'jasa lainnya room ',
            'perencanaan room ',
            'pemilihan room ',
            'pelaksanaan kontrak room ',
        ];
        Room::truncate();
        for ($i=1; $i < 6; $i++) { 
            foreach ($bidangs as $key=>$bidang) {
                Room::updateOrCreate(['name' => $bidang.$i, 'bidang_code'=>$key]);
            }  
        }
    }
}
