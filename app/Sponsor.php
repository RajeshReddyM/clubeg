<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{

    protected $fillable = ['name', 'email'];

    public function tournaments()
    {
        return $this->belongsToMany('App\Tournament')
          ->withTimestamps();
    }

    public function deleteTournaments() {
        $tournaments = $this->tournaments;
        foreach ($tournaments as $t) {
            $this->tournaments()->detach($t->id);
        }
    }

    public function assignTournaments($tournaments) {
        foreach ($tournaments as $t) {
            $this->tournaments()->attach($t);
        }
    }

    public function listTournamentIds()
    {
        return $this->tournaments->pluck('id')->toArray();
    }

    public function listTournamentNames()
    {
        return $this->tournaments->pluck('name')->toArray();
    }

}
