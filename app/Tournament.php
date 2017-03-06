<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{

    protected $fillable = ['name', 'start_time', 'golfcourse_id'];

    public function sponsors()
    {
        return $this->belongsToMany('App\Sponsor')
          ->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany('App\User')
          ->withTimestamps();
    }

    public function rounds()
    {
        return $this->hasMany('App\Round', 'tournament_id');
    }

    public function golfcourse()
    {
        return $this->belongsTo('App\Golfcourse');
    }

}
