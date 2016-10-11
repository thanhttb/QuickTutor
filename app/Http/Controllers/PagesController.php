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
        $gender = $request->gender;
        $job = $request->job;
        $city_id = $request->city_id;
        $districts = $request->districts;
        $subjects = $request->subjects;

        $results = Profile::when($gender,function($query) use ($gender){
            return $query->where('gender', $gender);
        });
        $results = $results->when($job,function($query) use ($job){
            return $query->where('job', $job);
        });
        $results = $results->when($city_id, function($query) use ($city_id){
            return $query->whereHas('city', function ($query) use ($city_id) {
                $query->where('id', $city_id);
            });
        });
        $results = $results->when($districts, function($query) use ($districts){
            return $query->whereHas('districts', function($query) use ($districts){
                $query->whereIn('id',$districts);
            });
        });
        $results = $results->when($subjects, function($query) use ($subjects){
            return $query->whereHas('subjects', function($query) use ($subjects){
                $query->whereIn('id',$subjects);
            });
        });
        dd($results->get());
    }
}
