<?php

namespace App\Listeners;

use App\Models\CustomerStore;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseCustomerTotalPriceInStoreListener {
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct () {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle ( $event ) {
        $customer = $event->customer;
        $store = $event->store;
        $price = $event->price;
        CustomerStore::firstOrCreate([
                                         'store_id' => $store->id ,
                                         'customer_id' => $customer->id,
                                     ])
                     ->increment('total_price' , $price);
    }
}
