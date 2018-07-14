<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    protected $fillable = ['friendship_request_sender','friendship_request_receiver','status'];

    protected $table = 'friendships';
}
