<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestEvent implements  ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
	public $booking_id;

    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($booking_id)
    {
        $this->username = $booking_id;
        $this->message  = "{$username} liked your status";
    }
 
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('notification');
    }
	public function broadcastWith()
    {
        return ['message'=>$this->message];
    }
}
