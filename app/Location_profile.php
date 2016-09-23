<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location_profile extends Model
{
    //
    protected $table='location_profile';
    protected $fillable=['profile_id','location_id'];
    public $timestampe=false;

}
