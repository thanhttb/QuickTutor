<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App;

use App\Profile;
use App\User;
use App\Subject;
use Carbon\Carbon;

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
        return view ('tutor.viewProfile', ['user' => $user, 'profile' => $user->profile]);
    }

    public function edit(User $user){
        if(\Auth::user() == $user){
            if(!$user->profile){
                $user->profile = Profile::create(['user_id'=>$user->id]);
            }
            return view('tutor.editProfile', ['profile'=>$user->profile, 'subjects' => Subject::all()]);
        }
        else return back();
    }

    public function save(Request $request, Profile $profile){
        $profile->update($request->all());
        $profile->subjects()->sync((array)$request->input('subjects'));
        return view('tutor.editProfile', ['profile' => $profile, 'subjects' => Subject::all()]);
    }

    public function destroy(User $user){
        $user->profile->delete();
        return redirect('home');
    }
}
