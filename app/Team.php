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

    public function listUserNames()
    {
        return $this->users->pluck('first_name')->toArray();
    }

    public function listUserIds()
    {
        return $this->users->pluck('id')->toArray();
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
