<?php

namespace App\Listeners;

use App\Models\Customer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPasswordToCustomerListener
{

    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        $customer = Customer::find($event->customer_id);
        $pattern = 'xxx';
        $phone_number = $customer->phone_number;
        $password = $event->password;

        try {
            \Http::get("http://ippanel.com:8080/?apikey=hTYfUbGN7ptpV9-ETbii5-a38qcFZOLKxZJNpj1meMc=&pid={$pattern}&fnum=9890000145&tnum={$phone_number}&p1=password&v1={$password}");
        }catch (\Exception){

        }
    }
}
