<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ConsumeLogCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $consume_log_id;
    public function __construct($consume_log_id)
    {
        $this->consume_log_id = $consume_log_id;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
