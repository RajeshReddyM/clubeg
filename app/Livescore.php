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

    public function total()
    {
        $total = 0;
        for($i=1; $i<=18; $i++) {
            $total += $this['H'.(string)$i];
        }
        return $total;
    }

    public function out()
    {
        $total = 0;
        for($i=1; $i<=9; $i++) {
            $total += $this['H'.(string)$i];
        }
        return $total;
    }

    public function in()
    {
        $total = 0;
        for($i=10; $i<=18; $i++) {
            $total += $this['H'.(string)$i];
        }
        return $total;
    }

    public function diff()
    {
        return 72 - $this->total();
    }
}
