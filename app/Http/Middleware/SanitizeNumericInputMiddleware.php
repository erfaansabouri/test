<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SanitizeNumericInputMiddleware {
    public function handle ( Request $request , Closure $next ) {
        $inputs = $request->all();
        foreach ( $inputs as $key => $value ) {
            if ( in_array($key , $this->inputNames()) && is_string($value) ) {
                $inputs[ $key ] = preg_replace('/[^0-9]/' , '' , $value);
            }
        }
        $request->merge($inputs);

        return $next($request);
    }

    public function inputNames () {
        return [
            'price' ,
            'discount_ceiling' ,
            'total_price' ,
            'capacity' ,
            'points' ,
            'point' ,
            'lower_purchase_amount' ,
            'upper_purchase_amount' ,
            'stars' ,
            'min_stars_count' ,
            'max_stars_count' ,
            'customer_completed_profile_event_stars' ,
            'customer_did_a_purchased_from_store_event_stars' ,
            'customer_joined_store_event_stars' ,
            'customer_purchased_more_than_amount' ,
            'customer_purchased_more_than_amount_event_stars' ,
            'customer_received_non_purchase_point_event_stars' ,
            'customer_referred_a_friend_event_stars' ,
        ];
    }
}
