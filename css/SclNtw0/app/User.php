<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Friendable;
use App\Notification;

class User extends Authenticatable
{
  use Notifiable, Friendable;


  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'firstname','lastname','gender','slug','image_path','email', 'password',
  ];
  
  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  protected $table = 'users';

  public function profile(){

    return $this->hasOne(Profile::class);

  }

  public function notifications(){

    return $this->hasMany(Notification::class);

  }
  //   public function getFeaturedImageAttribute()
  // {
  //     $db_image = User::find('id')->get('image_path');
  //     if ($db_image)
  //     {
  //         return $db_image->path;
  //     }
  // }
}
