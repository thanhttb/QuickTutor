<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject_profile extends Model
{
	protected $table='subject_profile';
	protected $fillable=['subject_id','class','tuition','profile_id'];
	public $timestamps=true;
    //
}