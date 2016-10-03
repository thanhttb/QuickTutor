<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'profile_id', 'linkAttach', 'public',
    ];

    public function profile(){
        return $this->belongsTo('App\Profile');
    }
}
