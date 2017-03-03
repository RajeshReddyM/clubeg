<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    public function sponsors()
    {
        return $this->belongsToMany('App\Sponsor')
          ->withTimestamps();
    }

    public function rounds()
    {
        return $this->hasMany('App\Round', 'tournament_id');
    }
}
