<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendMessage implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $message;
    public $avatar;
    
    public function __construct($user, $message, $avatar)
    {
        $this->user = $user;
        $this->message = $message;
        $this->avatar = $avatar;

        Log::info("Evento SendMessage disparado", [
            'user' => $user,
            'message' => $message,
            'avatar' => $avatar
        ]);
        
    }

    public function broadcastOn()
    {
        return 'my-channel';
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
