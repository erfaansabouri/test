<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PointCreatedEvent {
    use Dispatchable , InteractsWithSockets , SerializesModels;

    public $point_id;

    public function __construct ( $point_id ) {
        $this->point_id = $point_id;
    }

    public function broadcastOn () {
        return new PrivateChannel('channel-name');
    }
}
