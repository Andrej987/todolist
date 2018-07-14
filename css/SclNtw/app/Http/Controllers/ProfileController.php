<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Friendship;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notification;


class ProfileController extends Controller
{
  public function index(){


    // $profile = Profile::where('user_id', Auth::user()->id)->first();
    return view('profile.index')->with('data', Auth::user()->profile);

  }

  public function changePhoto(){

    return view('profile.image');

  }

  public function uploadPhoto(Request $request, User $user){

    $request->input('file');

    $imageName = $request->file->HashName();

    $request->file->storeAs('public/images', $imageName);

    $image_path = ($imageName);

    DB::table('users')
    ->where('id', Auth::user()->id)
    ->update(['image_path' => 'storage/images/'.$imageName ]);

    return redirect('profile/'.Auth::user()->id);
  }

  public function editProfile(){

    return view('profile.editProfile')->with('data', Auth::user()->profile);
  }

  public function updateProfile(Request $request){

    $profile = Profile::where('user_id', Auth::user()->id)->first();

    $this->validate(request(), [
      'city' => 'required',
      'country' => 'required',
      'about' => 'max:200'
    ]);

    $profile->city = $request->get('city');
    $profile->country = $request->get('country');
    $profile->about = $request->get('about');
    $profile->save();
    return back();

  }

  public function findFriends(){

    $uid = Auth::user()->id;

    $users = DB::table('profiles')
    ->leftJoin('users', 'users.id', '=', 'profiles.user_id')
    ->where('users.id', '!=', $uid)
    ->get();

    $friend_request_send = DB::table('friendships')
    ->where('friendship_request_sender', '=', $uid)
    ->pluck('friendship_request_receiver');

// $noty = Notification::where('receiver_id', Auth::user()->id)->where('type', 'NewFriendRequest')->where('is_read', null)->count();

    return view('profile.findFriends', compact('users', 'friend_request_send'));

  }

  public function addFriend($id){

    return Auth::user()->addFriend($id);


  }

  public function friendRequests(){

    $uid = Auth::user()->id;

    $friendRequests = DB::table('friendships')
    ->rightJoin('users', 'users.id', '=', 'friendship_request_sender')
    ->where('friendship_request_receiver', '=', $uid)
    ->where('status', null)
    ->get();

    $notification = Notification::where('receiver_id', Auth::user()->id)
    ->where('type', 'NewFriendRequest')
    ->where('is_read', false)->update(['is_read' => true]);



    return view('profile.friendRequests', compact('friendRequests'));

  }

  public function comfirmFriendship($id){

    $comfirmFriendship = Friendship::where('friendship_request_sender', $id)
    ->where('friendship_request_receiver', Auth::user()->id)
    ->first();

    if($comfirmFriendship){

      Friendship::where('friendship_request_sender', $id)
      ->where('friendship_request_receiver', Auth::user()->id)
      ->update(['status'=> 1 ]);
      return back();
    } else {

      return $response = [
        'status code' => 404,
        ' message ' => 'User Not Found'

      ];

    }
  }

  public function friendsList(){

    // $sentRequest_Friends = Friendship::where('status', 1)
    // ->leftJoin('users', 'users.id', 'friendships.friendship_request_receiver')
    // ->where('friendship_request_sender', Auth::user()->id)
    // ->get();
    //
    // $receivedRequest_Friends = Friendship::where('status', 1)
    // ->leftJoin('users', 'users.id', 'friendships.friendship_request_sender')
    // ->where('friendship_request_receiver', Auth::user()->id)
    // ->get();

    $sentRequest_Friends = DB::table('friendships')
    ->leftJoin('users', 'users.id', 'friendships.friendship_request_receiver')
    ->where('status', 1)
    ->where('friendship_request_sender', Auth::user()->id)
    ->get();

    $receivedRequest_Friends = DB::table('friendships')
    ->leftJoin('users', 'users.id', 'friendships.friendship_request_sender')
    ->where('status', 1)
    ->where('friendship_request_receiver', Auth::user()->id)
    ->get();

    $friends = array_merge($sentRequest_Friends->toArray(), $receivedRequest_Friends->toArray());

    return view('profile.friendsList', compact('friends'));
  }

  public function declineFriendship($id){

    $declineFriendship = Friendship::where('friendship_request_sender', $id)
    ->where('friendship_request_receiver', Auth::user()->id)->delete();

    return back();

  }


}
