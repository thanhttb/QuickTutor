<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
    ];

    public function profiles(){
        return $this->belongsToMany('App\Profile')->withTimestamps();
    }
}
