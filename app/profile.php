<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
         'user_id', 'name', 'email', 'phone1', 'phone2', 'facebook', 'gender',
         'birthDay', 'job', 'address', 'school', 'bio', 'linkAvatar', 'linkVideo', 'active',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function subjects(){
        return $this->belongsToMany('App\Subject');
    }

    public function sprare_times(){
        return $this->belongsToMany('App\SpareTime','profile_spare_time', 'profile_id', 'spare_time_id');
    }

    public function districts(){
        return $this->belongsToMany('App\District');
    }

    public function attachments(){
        return $this->hasMany('App\Attachment');
    }
}
