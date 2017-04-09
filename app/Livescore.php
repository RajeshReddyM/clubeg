<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livescore extends Model
{

    public function tournament()
    {
        return $this->belongsTo('App\Tournament');
    }

    public function golfcourse()
    {
        return $this->belongsTo('App\Golfcourse');
    }

    public function teamusers()
    {
        return $this->tournament->users->pluck('first_name')->toArray();
    }

    public function groupusers()
    {
        return $this->tournament->users->pluck('first_name')->toArray();
    }
}
