<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\StoreManager;
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
        for ($i=0; $i<20; $i++){
            $name = Factory::create('fa_IR')->name;
            $store = new Store();
            $store->title = "کسب و کار " . $name;
            $store->price = 100000;
            $store->point = rand(3,10);
            $store->save();

            $store_manager = new StoreManager();
            $store_manager->store_id = $store->id;
            $store_manager->first_name = "صاحب" . " $name";
            $store_manager->last_name = "تبریزی";
            $store_manager->phone_number = "0936" . rand(1000000,9999999);
            $store_manager->password = bcrypt('as12AS!@');
            $store_manager->is_super_manager = true;
            $store_manager->is_disable = false;
            $store_manager->save();
            $rand = rand(1,30);
            $store_manager->addMediaFromUrl(asset("global-assets/media/avatars/300-{$rand}.jpg"))->toMediaCollection('avatar');
        }

        StoreManager::first()
            ->update([
                'phone_number' => "09360358326",
            ]);
    }
}
