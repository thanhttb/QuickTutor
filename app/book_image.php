<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_image extends Model
{
	protected $table='book_images';
	protected $fillable=['profile_id','image','id'];
	public $timestamps=true;
	public function profile(){
		return $this->belongsTo('App\profile','profile_id');
		
	}
    //
}
