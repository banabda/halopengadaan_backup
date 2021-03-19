<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MetodePembayaranSeeder::class);
        // $this->call(ChatSeeder::class);
        $this->call(RoomSeeder::class);
        // $this->call(TicketSeeder::class);
    }
}
