<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CustomerCreatedEvent {
    use Dispatchable , InteractsWithSockets , SerializesModels;

    public $customer_id;
    public $password;

    public function __construct ( $customer_id , $password ) {
        $this->customer_id = $customer_id;
        $this->password = $password;
    }

    public function broadcastOn () {
        return new PrivateChannel('channel-name');
    }
}
