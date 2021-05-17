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

    /**
     * User that sent the message
     *
     * @var User
     */
//    public $noidung;
//    public $thoigian;
//    public $ma_nguoidung;
//    public $ma_cuahang;
    public $data;

    /**
     * Message details
     *
     * @var Message
     */

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( $data)
    {
//        $this->ma_nguoidung = $ma_nguoidung;
//        $this->ma_cuahang = $ma_cuahang;
//        $this->thoigian = $thoigian;
//        $this->noidung = $noidung;
        $this->data = $data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
//    public function broadcastOn()
//    {
//        return new PrivateChannel('chat');
//    }
    
    
    public function broadcastOn()
    {
        return ['chat'];
    }

//    public function broadcastAs()
//    {
//        return 'MessageSent';
//    }
}
