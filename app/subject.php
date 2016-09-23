<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

	protected $table='subjects';
	protected $fillable=['subjectName','id'];
	public $timestamps=true;
	public function profile(){
		return $this->belongsToMany('App\Profile','subject_profile','subject_id','profile_id');
	}
    //
}
