<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Point;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointSeeder extends Seeder
{
    public function run()
    {
        $customers = Customer::inRandomOrder()->get();
        foreach ($customers as $customer){
            $max = rand(1,100);
            for ($i = 0; $i<$max; $i++){
                $store = Store::inRandomOrder()->first();
                $price = rand(100,999) * 1000;
                $point = new Point();
                $point->customer_id = $customer->id;
                $point->store_id = $store->id;
                $point->price = $price;
                $point->point = $store->calculatePoint($price);
                $point->created_at = Carbon::now()->subDays(rand(1,300));
                $point->save();
            }
        }
    }
}
