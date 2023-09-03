<?php

namespace Database\Seeders;

use App\Models\Customer;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $customer = new Customer();
            $customer->first_name = Factory::create('fa_IR')->firstName;
            $customer->last_name = Factory::create('fa_IR')->lastName;
            $customer->group_name = "مشتری";
            $customer->email = Factory::create('fa_IR')->email;
            $customer->phone_number = Factory::create('fa_IR')->phoneNumber;
            $customer->national_code = Factory::create('fa_IR')->postcode;
            $customer->birthdate = Carbon::parse()->format('Y-m-d');
            $customer->save();
        }

        $customer = Customer::first();
        $customer->phone_number = '09191111111';
        $customer->password = bcrypt('as12AS!@');
        $customer->save();

    }
}
