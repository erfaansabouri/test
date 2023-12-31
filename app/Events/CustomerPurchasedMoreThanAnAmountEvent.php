<?php

namespace App\Events;

use App\Models\StoreSetting;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CustomerPurchasedMoreThanAnAmountEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $customer;
    public $store;
    public $stars;
    public $type;
    public function __construct($customer, $store)
    {
        $this->customer = $customer;
        $this->store = $store;
        $this->stars = StoreSetting::query()->where('store_id', $store->id)->firstOrFail()->customer_purchased_more_than_amount_event_stars;
        $this->type = self::class;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
