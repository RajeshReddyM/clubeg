<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    public function tournaments()
    {
        return $this->belongsToMany('App\Tournament')
          ->withTimestamps();
    }
}
