<?php

namespace Database\Seeders;

use App\Models\Store;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<100; $i++){
            $store = new Store();
            $store->title = Factory::create('fa_IR')->name;
            $store->price = 100000;
            $store->point = rand(3,10);
            $store->save();
        }
    }
}
