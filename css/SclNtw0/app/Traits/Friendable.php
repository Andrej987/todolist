<?php
namespace App\Traits;
use App\Friendship;
use App\Events\NewFriendRequestEvent;

/**
*
*/
trait Friendable
{

  public  function test()
  {
    echo 'wiiiiiiiii';
  }

  public function addFriend($id){


    $freindship = Friendship::create([
      'friendship_request_sender'=> $this->id, // logged user id
      'friendship_request_receiver' => $id
    ]);

    event(new NewFriendRequestEvent($freindship));

    if($freindship){

      return back();
    }
    return 'Error';
  }
}
