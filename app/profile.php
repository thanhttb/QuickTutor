<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
         'user_id', 'name', 'email', 'phone1', 'phone2', 'facebook', 'gender',
         'birthDay', 'job', 'address', 'school', 'bio', 'linkAvatar', 'linkVideo', 'active', 'price'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function subjects(){
        return $this->belongsToMany('App\Subject');
    }

    public function times(){
        return $this->belongsToMany('App\Time');
    }

    public function districts(){
        return $this->belongsToMany('App\District');
    }

    public function attachments(){
        return $this->hasMany('App\Attachment');
    }
}
