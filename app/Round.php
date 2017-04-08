<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
  protected $fillable = ['name', 'tournament_id'];

  public function tournament()
  {
    return $this->belongsTo('App\Tournament');
  }
}
