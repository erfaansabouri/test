<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class OldDatabaseSeeder extends Seeder {
    public function run () {
        $old_db = file_get_contents(asset('global-assets/old-db/db.json'));
        $decoded = json_decode($old_db)->Sheet1;
        foreach ( $decoded as $old_customer ) {
            Customer::query()
                    ->create([
                                 'phone_number' => "0" . $old_customer->phone ,
                                 'first_name' => $old_customer->first_name ,
                                 'last_name' => $old_customer->last_name ,
                                 'password' => bcrypt(rand()),
                                 'balance' => str_replace(',', '', $old_customer->balance) ,
                             ]);
        }
    }
}
