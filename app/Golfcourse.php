<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golfcourse extends Model
{
  public function golfclub()
  {
    return $this->belongsTo('App\Golfclub');
  }
}
