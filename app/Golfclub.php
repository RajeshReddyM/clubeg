<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Golfclub extends Model
{
    protected $fillable = ['name', 'street_no', 'street_name', 'city', 'province', 'logo'];

    public function users()
    {
        return $this->belongsToMany('App\User')
          ->withTimestamps();
    }

    public function golfcourses()
    {
        return $this->hasMany('App\Golfcourse', 'golfclub_id');
    }

    // Return Golf courses
    public function listCourses()
    {
        return $this->golfcourses;
    }
}
