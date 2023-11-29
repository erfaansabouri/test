<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Admin::PERMISSIONS as $key => $value)
        {
            Permission::firstOrCreate(['name' => $value, 'guard_name' => 'admin']);
        }
    }
}
