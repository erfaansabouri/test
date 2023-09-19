<?php

namespace App\Listeners;

use App\Models\ConsumeLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendConsumeLogSmsToCustomerListener {
    public function __construct () {
        //
    }

    public function handle ( $event ) {
        $consume_log = ConsumeLog::find($event->consume_log_id);
        if ( $consume_log ) {
            $pattern = 'dpobeln24v64cdb';
            $phone_number = $consume_log->customer->phone_number;
            $points = $consume_log->point;
            $full_name = $consume_log->customer->full_name;
            $store_name = $consume_log->store->title;
            \Http::get("http://ippanel.com:8080/?apikey=hTYfUbGN7ptpV9-ETbii5-a38qcFZOLKxZJNpj1meMc=&pid={$pattern}&fnum=9890000145&tnum={$phone_number}&p1=name&p2=point&p3=store&v1={$full_name}&v2={$points}&v3={$store_name}");
            try {
            }
            catch ( \Exception $exception ) {

            }
        }
    }
}
