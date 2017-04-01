<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{

    protected $fillable = ['name', 'start_date', 'type', 'visibility', 'division', 'golfcourse_id'];

    // protected static $types = [ 'charity' => 'Charity' ];

    // protected static $visibility = [ 'private' => 'Private' ];

    // protected static $division = [ 'division1' => 'Division1' ];

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

    public function livescores()
    {
        return $this->hasMany('App\Livescore', 'tournament_id');
    }

}
