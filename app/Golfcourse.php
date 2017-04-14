<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golfcourse extends Model
{
  
    protected $fillable = ['name', 'hole_no', 'hole_length', 'logo', 'golfclub_id'];

    public function tournaments()
    {
    return $this->hasMany('App\Tournament', 'golfcourse_id');
    }

    public function golfclub()
    {
    return $this->belongsTo('App\Golfclub');
    }

    public function livescores()
    {
        return $this->hasMany('App\Livescore', 'golfcourse_id');
    }

    public function assignParValues($request)
    {
        for ($i=1; $i<=18; $i++) {
            $this['P'.(string)$i] = $request['P'.(string)$i];
        }
    }
}
