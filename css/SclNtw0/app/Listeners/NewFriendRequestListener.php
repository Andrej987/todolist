<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notification;
use App\Events\NewFriendRequestEvent;

class NewFriendRequestListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewFriendRequestEvent $event)
    {

      Notification::create([
        'receiver_id'=> $event->friendship->friendship_request_receiver,
        'sender_id'=>$event->friendship->friendship_request_sender,
        'type'=> 'NewFriendRequest',
        'data'=>'newFriend',
        'is_read'=> false,
    ]);
    }
}
