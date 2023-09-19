<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{

    public function run()
    {
        $admin = new Admin();
        $admin->first_name = "مدیریت";
        $admin->last_name = "اصلی";
        $admin->phone_number = "09371111111";
        $admin->password = bcrypt('as12AS!@');
        $admin->is_super_admin = true;
        $admin->is_disable = false;
        $admin->save();
    }
}
