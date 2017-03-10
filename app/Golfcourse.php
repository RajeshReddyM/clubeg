<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golfcourse extends Model
{
  
  protected $fillable = ['name', 'hole_no', 'hole_length', 'par', 'logo', 'golfclub_id'];
  

  public function tournaments()
  {
    return $this->hasMany('App\Tournament', 'golfcourse_id');
  }

  public function golfclub()
  {
    return $this->belongsTo('App\Golfclub');
  }

}