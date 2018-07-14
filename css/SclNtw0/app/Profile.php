<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $fillable = ['user_id','city','country','about' ];

  protected $table = 'profiles';

  public function profile() {

    return $this->belongsTo(User::class);

  }
}
