<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
    ];

    public function districts(){
        return $this->hasMany('App\District');
    }
    public function profiles(){
        return $this->hasManyThrough('App\Profile', 'App\District');
    }
}
