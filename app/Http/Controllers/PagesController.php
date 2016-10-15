<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App;
use App\Profile;
use App\User;
use App\Subject;
use App\District;
use App\Attachment;
use App\Time;
use App\City;

class PagesController extends Controller
{
    public function findTutorIndex(){
        // dd(City::all());
        return view('pages.findTutor', ['cities' => City::all(), 'subjects' => Subject::all()]);
    }
    public function findTutorResult(Request $request){
        // dd($request);
        $gender = $request->gender;
        $job = $request->job;
        $city_id = $request->city_id;
        $districts = $request->districts;
        $subjects = $request->subjects;

        $resultProfiles = Profile::when($gender,function($query) use ($gender){
            return $query->where('gender', $gender);
        });
        $resultProfiles = $resultProfiles->when($job,function($query) use ($job){
            return $query->where('job', $job);
        });
        $resultProfiles = $resultProfiles->when($city_id, function($query) use ($city_id){
            return $query->whereHas('city', function ($query) use ($city_id) {
                $query->where('id', $city_id);
            });
        });
        $resultProfiles = $resultProfiles->when($districts, function($query) use ($districts){
            return $query->whereHas('districts', function($query) use ($districts){
                $query->whereIn('id',$districts);
            });
        });
        $resultProfiles = $resultProfiles->when($subjects, function($query) use ($subjects){
            return $query->whereHas('subjects', function($query) use ($subjects){
                $query->whereIn('id',$subjects);
            });
        });
        $resultProfiles = $resultProfiles->where('active', 1);
        $resultProfiles = $resultProfiles->paginate(12);
        return view('tutor.resultSearchProfiles', ['profiles' => $resultProfiles])->render();
    }
}
