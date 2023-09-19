<?php

namespace App\Listeners;

use App\Models\Point;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPointSmsToCustomerListener {
    public function __construct () {
        //
    }

    public function handle ( $event ) {
        $point = Point::find($event->point_id);
        if ( $point ) {
            $pattern = 'g77kh9zvxjgy0bj';
            $phone_number = $point->customer->phone_number;
            $full_name = $point->customer->full_name;
            $store_name = $point->store->title;
            $points = $point->point;

            try {
                \Http::get("http://ippanel.com:8080/?apikey=hTYfUbGN7ptpV9-ETbii5-a38qcFZOLKxZJNpj1meMc=&pid={$pattern}&fnum=9890000145&tnum={$phone_number}&p1=name&p2=point&p3=store&v1={$full_name}&v2={$points}&v3={$store_name}");
            }
            catch ( \Exception $exception ) {

            }
        }
    }
}
