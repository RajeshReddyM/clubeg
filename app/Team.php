<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User')
          ->withTimestamps();
    }

    public function listUsers() 
    {
        return $this->users->pluck('first_name')->toArray();
    }
}
