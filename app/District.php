<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name', 'city_id',
    ];
    public function profiles(){
        return $this->belongsToMany('App\Profile')->withTimestamps();
    }
    public function city(){
        return $this->belongsTo('App\City');
    }
}
