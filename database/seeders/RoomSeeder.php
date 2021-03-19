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
            'konstruksi room ',
            'konsultan non konstruksi room ',
            'sua kelola room ',
            'jasa lainnya room ',
        ];
        for ($i=1; $i < 6; $i++) { 
            foreach ($bidangs as $key=>$bidang) {
                Room::firstOrCreate(['name' => $bidang.$i, 'bidang_code'=>$key]);
            }  
        }
    }
}
