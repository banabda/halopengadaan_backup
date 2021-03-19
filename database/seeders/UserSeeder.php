<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::firstOrCreate([
            'name' => 'IT LPKN',
            'email' => 'it@lpkn.id',
            'password' => Hash::make('123123'),
            'status' => 'Teraktifasi'
        ]);

        $narasumber = User::firstOrCreate([
            'name' => 'Narasumber LPKN',
            'email' => 'narasumber@lpkn.id',
            'password' => Hash::make('123123'),
            'status' => 'Teraktifasi'
        ]);

        $narasumber->assignRole('narasumber');
        
        $narasumber = User::firstOrCreate([
            'name' => 'Zulkifli Raihan',
            'email' => 'zulkifli@lpkn.id',
            'password' => Hash::make('123123'),
            'status' => 'Teraktifasi'
        ]);

        $narasumber->assignRole('narasumber');

        $user = User::firstOrCreate([
            'name' => 'Saulia Karina',
            'email' => 'sauliakarina@lpkn.id',
            'password' => Hash::make('123123'),
            'status' => 'Teraktifasi'
        ]);

        $user->assignRole('user');

        $user = User::firstOrCreate([
            'name' => 'Bagas Nabil',
            'email' => 'bagas@lpkn.id',
            'password' => Hash::make('123123'),
            'status' => 'Teraktifasi'
        ]);

        $user->assignRole('user');
        $admin->assignRole('super admin')->givePermissionTo(Permission::all());
    }

}
