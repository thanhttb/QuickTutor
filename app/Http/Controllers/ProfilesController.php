<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App;

use App\Profile;
use App\User;

class ProfilesController extends Controller
{
    public function viewAllComponents(){
        return view('SourceComponents', [
            'subjects' => App\Subject::all(),
            'spareTimes' => App\SpareTime::all(),
            'districts' => App\District::all(),
            'cities' => App\City::all(),
        ]);
    }

    public function index(User $user){
        $profile = $user->profile;
        return view ('tutor.viewProfile', ['user' => $user, 'profile' => $profile]);
    }

    public function edit(User $user){
        if(\Auth::user() == $user){
            if(!$user->profile) $profile = new Profile;
            return view('tutor.editProfile');
        }
        else return back();
    }
}
