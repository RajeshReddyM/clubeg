<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{

    protected $fillable = ['name', 'email'];
    public function sponsor()
    {
        return $this->belongsToMany('App\Tournament')
          ->withTimestamps();
    }
}
