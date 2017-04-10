<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User')
          ->withTimestamps();
    }

    public function tournaments()
    {
        return $this->belongsToMany('App\Tournament')
          ->withTimestamps();
    }

    public function listUserNames()
    {
        return $this->users->pluck('first_name')->toArray();
    }

    public function listTournamentNames()
    {
        return $this->tournaments->pluck('name')->toArray();
    }

    public function listUserIds()
    {
        return $this->users->pluck('id')->toArray();
    }

    public function listTournamentIds()
    {
        return $this->tournaments->pluck('id')->toArray();
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

    public function deleteUsers() {
        $users = $this->users;
        foreach ($users as $user) {
            $this->users()->detach($user->id);
        }
    }

    public function assignUsers($users) {
        foreach ($users as $user) {
            $this->users()->attach($user);
        }
    }

}
