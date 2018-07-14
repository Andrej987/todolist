<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Notification extends Model
{
  protected $fillable = ['receiver_id','sender_id','type','data','is_read'];

  protected $table = 'notifications';

  public function user(){

    return $this->belongToMany(User::class);
  }
}
