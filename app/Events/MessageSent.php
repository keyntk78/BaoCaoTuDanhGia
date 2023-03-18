<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $binhLuan;
    public $room;
    public $action;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($binhLuan, $room, $action = null)
    {
        $this->binhLuan = $binhLuan;
        $this->room = $room;
        $this->action = $action;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('room.'.$this->room);
    }

    public function broadcastWith()
    {
        return [
            'binhLuan' => $this->binhLuan,
            'action'   => $this->action
        ];
    }
}
