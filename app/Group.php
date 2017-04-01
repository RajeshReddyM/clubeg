<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use Debugbar;

class Group extends Model
{
    protected $fillable = ['name'];
    
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
