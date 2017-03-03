<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golfclub extends Model
{

    public function users()
    {
        return $this->belongsToMany('App\User')
          ->withTimestamps();
    }

    public function golfcourses()
    {
        return $this->hasMany('App\Golfcourse', 'golfclub_id');
    }

}
