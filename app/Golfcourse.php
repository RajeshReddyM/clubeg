<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golfcourse extends Model
{
  
  protected $fillable = ['name', 'logo', 'golfclub_id'];
  
  public function golfclub()
  {
    return $this->belongsTo('App\Golfclub');
  }
}
