<?php

namespace App\Listeners;

use App\Models\CustomerStore;
use App\Models\Star;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddStarListener
{

    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        $customer = $event->customer;
        $store = $event->store;
        $stars = $event->stars;
        $type = $event->type;

        Star::query()
            ->create([
                'customer_id' => $customer->id,
                'store_id' => $store->id,
                'stars' => $stars,
                'type' => $type
            ]);

        $customer_store = CustomerStore::query()
            ->firstOrCreate(['store_id' => $store->id, 'customer_id' => $customer->id]);

        $customer_store->increment('stars', $stars);
    }
}
