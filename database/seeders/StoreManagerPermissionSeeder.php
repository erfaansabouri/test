<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\StoreManager;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class StoreManagerPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (StoreManager::PERMISSIONS as $key => $value)
        {
            Permission::create(['name' => $value, 'guard_name' => 'store-manager']);
        }
    }
}
