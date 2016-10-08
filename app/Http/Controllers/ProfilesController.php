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


class ProfilesController extends Controller
{
    public function viewAllComponents(){
        return view('SourceComponents', [
            'subjects' => App\Subject::all(),
            'times' => App\Time::all(),
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
            return view('tutor.editProfile', ['profile'=>$user->profile, 'subjects' => Subject::all(), 'cities' => City::all()]);
        }
        else return back();
    }

    public function save(Request $request, Profile $profile){
        // dd($request->all());
        $profile->update($request->all());
        // dd($profile);
        $profile->subjects()->sync((array)$request->input('subjects'));
        $profile->districts()->sync((array)$request->input('districts'));
        $profile->times()->sync((array)$request->input('times'));
        return view('tutor.editProfile', ['profile' => $profile, 'subjects' => Subject::all(), 'cities'=> City::all()]);
    }

    public function destroy(User $user){
        $user->profile->delete();
        return redirect('home');
    }

    public function getDistrict(Request $request){
        $city_id = $request->input('city_id');
        $districts = City::findOrFail($city_id)->districts;
        echo($districts->toJson());
    }

    public function addSampleData(){
        //create Subject
        App\Subject::create(['name'=>'Toán']);
        App\Subject::create(['name'=>'Lí']);
        App\Subject::create(['name'=>'Hóa']);
        App\Subject::create(['name'=>'Văn']);
        App\Subject::create(['name'=>'Anh']);
        // create District
        App\City::create(['name'=>'Hà Nội']);
        App\City::create(['name'=>'Hồ Chí Minh']);
        App\City::create(['name'=>'Đà Nẵng']);
        App\City::create(['name'=>'Thái Nguyên']);

        // create District
        App\District::create(['name'=>'Ba Đình', 'city_id'=>'1']);
        App\District::create(['name'=>'Cầu Giấy', 'city_id'=>'1']);
        App\District::create(['name'=>'Hà Đông', 'city_id'=>'1']);
        App\District::create(['name'=>'Hoàng Mai', 'city_id'=>'1']);

        App\District::create(['name'=>'Bình Chánh', 'city_id'=>'2']);
        App\District::create(['name'=>'Gò Vấp', 'city_id'=>'2']);
        App\District::create(['name'=>'Quận 1', 'city_id'=>'2']);
        App\District::create(['name'=>'Phú Nhuận', 'city_id'=>'2']);

        App\District::create(['name'=>'Hải Châu', 'city_id'=>'3']);
        App\District::create(['name'=>'Hoàng Sa', 'city_id'=>'3']);
        App\District::create(['name'=>'Ngũ Hành Sơn', 'city_id'=>'3']);
        App\District::create(['name'=>'Sơn Trà', 'city_id'=>'3']);

        App\District::create(['name'=>'Đại Từ', 'city_id'=>'4']);
        App\District::create(['name'=>'Phú Lương', 'city_id'=>'4']);
        App\District::create(['name'=>'Đồng Hỷ', 'city_id'=>'4']);
        App\District::create(['name'=>'Định Hóa', 'city_id'=>'4']);

        App\Time::create(['day'=>'2','session'=>'1']);
        App\Time::create(['day'=>'2','session'=>'2']);
        App\Time::create(['day'=>'2','session'=>'3']);

        App\Time::create(['day'=>'3','session'=>'1']);
        App\Time::create(['day'=>'3','session'=>'2']);
        App\Time::create(['day'=>'3','session'=>'3']);

        App\Time::create(['day'=>'4','session'=>'1']);
        App\Time::create(['day'=>'4','session'=>'2']);
        App\Time::create(['day'=>'4','session'=>'3']);

        App\Time::create(['day'=>'5','session'=>'1']);
        App\Time::create(['day'=>'5','session'=>'2']);
        App\Time::create(['day'=>'5','session'=>'3']);

        App\Time::create(['day'=>'6','session'=>'1']);
        App\Time::create(['day'=>'6','session'=>'2']);
        App\Time::create(['day'=>'6','session'=>'3']);

        App\Time::create(['day'=>'7','session'=>'1']);
        App\Time::create(['day'=>'7','session'=>'2']);
        App\Time::create(['day'=>'7','session'=>'3']);

        App\Time::create(['day'=>'8','session'=>'1']);
        App\Time::create(['day'=>'8','session'=>'2']);
        App\Time::create(['day'=>'8','session'=>'3']);

        return redirect('/components');
    }
}
