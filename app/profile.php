<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
	protected $table='profile';
	protected $fillable=['id','name','phone1','phone2','gender','birth','fb','job','street','district','city','school','spareTime','description','avatar'];
	public $timestamps=true;
	public function subject(){
		return $this->belongsToMany('App\subject','subject_profile','profile_id','subject_id');
	}
	public function book_image(){
		return $this->hasMany('App\book_image','profile_id','id');
	}
    //
}
