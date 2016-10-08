<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = [
         'day', 'session',
    ];
    public function profiles(){
        return $this->belongsToMany('App\Profile')->withTimestamps();
    }
}
