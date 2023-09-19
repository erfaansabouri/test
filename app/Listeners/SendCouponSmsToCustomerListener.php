<?php

namespace App\Listeners;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCouponSmsToCustomerListener {
    public function __construct () {
        //
    }

    public function handle ( $event ) {
        $coupon = Coupon::find($event->coupon_id);
        if ( $coupon ) {
            $pattern = '8z0m9ftyize4bnu';
            $full_name = $coupon->customer->full_name;
            $phone_number = $coupon->customer->phone_number;
            $percent = $coupon->discount_percent;
            $upper = $coupon->discount_ceiling;
            $days = Carbon::parse($coupon->expired_at)
                          ->diffInDays(now());
            $store = $coupon->store->title;
            try {
                \Http::get("http://ippanel.com:8080/?apikey=hTYfUbGN7ptpV9-ETbii5-a38qcFZOLKxZJNpj1meMc=&pid={$pattern}&fnum=9890000145&tnum={$phone_number}&p1=name&p2=percent&p3=upper&p4=days&p5=store&v1={$full_name}&v2={$percent}&v3={$upper}&v4={$days}&v5={$store}");
            }
            catch ( \Exception $exception ) {

            }
        }
    }
}
