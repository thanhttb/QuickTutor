<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpareTime extends Model
{
    protected $fillable = [
         'day', 'session',
    ];
    public function profiles(){
        return $this->belongsToMany('App\Profile', 'profile_spare_time', 'spare_time_id', 'profile_id');
    }
}
