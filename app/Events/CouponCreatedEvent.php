<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CouponCreatedEvent {
    use Dispatchable , InteractsWithSockets , SerializesModels;

    public $coupon_id;

    public function __construct ( $coupon_id ) {
        $this->coupon_id = $coupon_id;
    }

    public function broadcastOn () {
        return new PrivateChannel('channel-name');
    }
}
