<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $table='locations';
    protected $fillable=['district','city'];
    public $timestamps=true;
    public function profile(){
    	return $this->belongsToMany('App\Profile','location_profile','location_id','profile_id');
    	
    }
}
