<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(AdminPermissionSeeder::class);
        $this->call(StoreManagerPermissionSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(OldDatabaseSeeder::class);
       /* $this->call(StoreSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(PointSeeder::class);*/
    }
}
