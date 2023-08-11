<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Point;
use App\Models\PointType;
use App\Models\Store;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointSeeder extends Seeder
{
    public function run()
    {
        PointType::create([
            'type' => 'purchase',
            'type_fa' => 'خرید',
        ]);
        PointType::create([
            'type' => 'non-purchase',
            'type_fa' => 'غیر پرداختی',
        ]);
        $customers = Customer::inRandomOrder()->get();
        foreach ($customers as $customer) {
            $max = rand(1, 20);
            for ($i = 0; $i < $max; $i++) {
                $store = Store::inRandomOrder()->first();
                $price = rand(100, 999) * 1000;
                $point = new Point();
                $point->customer_id = $customer->id;
                $point->store_id = $store->id;
                $point->price = $price;
                $point->point = $store->calculatePoint($price);
                $point->point_type_id = PointType::first()->id;
                $point->created_at = Carbon::now()->subDays(rand(1, 300));
                $point->save();
            }
            $max = rand(0, 5);
            for ($i = 0; $i < $max; $i++) {
                $point = new Point();
                $point->customer_id = $customer->id;
                $point->point = rand(1, 100);
                $point->point_type_id = PointType::query()->find(2)->id;
                $point->reason = Factory::create('fa_IR')->sentence;
                $point->created_at = Carbon::now()->subDays(rand(1, 300));
                $point->save();
            }
        }
    }
}
