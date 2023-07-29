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
        $admin->first_name = "عرفان";
        $admin->last_name = "صبوری";
        $admin->phone_number = "09372033422";
        $admin->password = bcrypt('as12AS!@');
        $admin->save();
    }
}