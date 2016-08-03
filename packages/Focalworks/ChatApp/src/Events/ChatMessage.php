<?php

namespace Focalworks\ChatApp\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChatMessage extends Event implements ShouldBroadcast
{
    use SerializesModels;
    public $user;
    public $message;
    public $to;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->user = $data['user'];
        $this->message = $data['message'];
        $this->to = $data['to'];
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        \Log::info('event broadcast');
        return ['test-channel'];
    }
}
