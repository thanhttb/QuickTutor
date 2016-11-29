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
            return view('tutor.editProfile', ['profile' => $user->profile, 'subjects' => Subject::all(), 'cities' => City::all()]);
        }
        else redirect('home');
    }

    public function save(Request $request, Profile $profile){
        if($request->active1){
            $profile->active = 1;
        } else{
            $profile->active = 0;
        }
        // dd($request);
        $profile->update($request->all());
        // dd($profile->times);

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
        if($districts){
             echo($districts->toJson());
        }
    }

    public function addSampleData(){
        //create Subject
        if(App\Subject::all() || App\District::all() || App\Time::all()) return redirect('home');
        App\Subject::create(['name'=>'Toán lớp 1']);
        App\Subject::create(['name'=>'Toán lớp 2']);
        App\Subject::create(['name'=>'Toán lớp 3']);
        App\Subject::create(['name'=>'Toán lớp 4']);
        App\Subject::create(['name'=>'Toán lớp 5']);
        App\Subject::create(['name'=>'Toán lớp 6']);
        App\Subject::create(['name'=>'Toán lớp 7']);
        App\Subject::create(['name'=>'Toán lớp 8']);
        App\Subject::create(['name'=>'Toán lớp 9']);
        App\Subject::create(['name'=>'Toán lớp 10']);
        App\Subject::create(['name'=>'Toán lớp 11']);
        App\Subject::create(['name'=>'Toán lớp 12']);

        App\Subject::create(['name'=>'Lí lớp 6']);
        App\Subject::create(['name'=>'Lí lớp 7']);
        App\Subject::create(['name'=>'Lí lớp 8']);
        App\Subject::create(['name'=>'Lí lớp 9']);
        App\Subject::create(['name'=>'Lí lớp 10']);
        App\Subject::create(['name'=>'Lí lớp 11']);
        App\Subject::create(['name'=>'Lí lớp 12']);

        App\Subject::create(['name'=>'Hóa lớp 8']);
        App\Subject::create(['name'=>'Hóa lớp 9']);
        App\Subject::create(['name'=>'Hóa lớp 10']);
        App\Subject::create(['name'=>'Hóa lớp 11']);
        App\Subject::create(['name'=>'Hóa lớp 12']);

        App\Subject::create(['name'=>'Tiếng Anh lớp 1']);
        App\Subject::create(['name'=>'Tiếng Anh lớp 2']);
        App\Subject::create(['name'=>'Tiếng Anh lớp 3']);
        App\Subject::create(['name'=>'Tiếng Anh lớp 4']);
        App\Subject::create(['name'=>'Tiếng Anh lớp 5']);
        App\Subject::create(['name'=>'Tiếng Anh lớp 6']);
        App\Subject::create(['name'=>'Tiếng Anh lớp 7']);
        App\Subject::create(['name'=>'Tiếng Anh lớp 8']);
        App\Subject::create(['name'=>'Tiếng Anh lớp 9']);
        App\Subject::create(['name'=>'Tiếng Anh lớp 10']);
        App\Subject::create(['name'=>'Tiếng Anh lớp 11']);
        App\Subject::create(['name'=>'Tiếng Anh lớp 12']);

        App\Subject::create(['name'=>'Ngữ Văn lớp 6']);
        App\Subject::create(['name'=>'Ngữ Văn lớp 7']);
        App\Subject::create(['name'=>'Ngữ Văn lớp 8']);
        App\Subject::create(['name'=>'Ngữ Văn lớp 9']);
        App\Subject::create(['name'=>'Ngữ Văn lớp 10']);
        App\Subject::create(['name'=>'Ngữ Văn lớp 11']);
        App\Subject::create(['name'=>'Ngữ Văn lớp 12']);

        App\Subject::create(['name'=>'Tiếng Việt lớp 1']);
        App\Subject::create(['name'=>'Tiếng Việt lớp 2']);
        App\Subject::create(['name'=>'Tiếng Việt lớp 3']);
        App\Subject::create(['name'=>'Tiếng Việt lớp 4']);

        App\Subject::create(['name'=>'Sinh học lớp 6']);
        App\Subject::create(['name'=>'Sinh học lớp 7']);
        App\Subject::create(['name'=>'Sinh học lớp 8']);
        App\Subject::create(['name'=>'Sinh học lớp 9']);
        App\Subject::create(['name'=>'Sinh học lớp 10']);
        App\Subject::create(['name'=>'Sinh học lớp 11']);
        App\Subject::create(['name'=>'Sinh học lớp 12']);


        App\Subject::create(['name'=>'Toán luyện thi đại học']);
        App\Subject::create(['name'=>'Lí luyện thi đại học']);
        App\Subject::create(['name'=>'Hóa luyện thi đại học']);
        App\Subject::create(['name'=>'Anh luyện thi đại học']);
        App\Subject::create(['name'=>'Sinh luyện thi đại học']);
        App\Subject::create(['name'=>'Văn luyện thi đại học']);
        App\Subject::create(['name'=>'Sử luyện thi đại học']);
        App\Subject::create(['name'=>'Địa luyện thi đại học']);

        App\Subject::create(['name'=>'Tiếng anh giao tiếp']);
        App\Subject::create(['name'=>'Tiếng anh A1']);
        App\Subject::create(['name'=>'Tiếng anh A2']);
        App\Subject::create(['name'=>'Tiếng anh B1']);
        App\Subject::create(['name'=>'Tiếng anh B2']);
        App\Subject::create(['name'=>'Tiếng anh C1']);
        App\Subject::create(['name'=>'Tiếng anh C2']);
        App\Subject::create(['name'=>'TOEIC']);
        App\Subject::create(['name'=>'IELTS']);
        App\Subject::create(['name'=>'TOEFL']);


        App\Subject::create(['name'=>'Tiếng Nhật']);
        App\Subject::create(['name'=>'Tiếng Trung']);
        App\Subject::create(['name'=>'Tiếng Hàn']);
        App\Subject::create(['name'=>'Tiếng Đức']);
        App\Subject::create(['name'=>'Tiếng Pháp']);
        App\Subject::create(['name'=>'Tiếng Nga']);
        App\Subject::create(['name'=>'Tiếng Tây Ban Nha']);


        App\Subject::create(['name'=>'Luyện chữ đẹp']);
        App\Subject::create(['name'=>'Âm nhạc']);
        App\Subject::create(['name'=>'Vẽ hội họa']);
        App\Subject::create(['name'=>'Võ thuật']);

        App\Subject::create(['name'=>'Tin học']);
        App\Subject::create(['name'=>'Tin học văn phòng']);


        // create District
        App\City::create(['name'=>'Hà Nội']);
        App\City::create(['name'=>'Hồ Chí Minh']);
        App\City::create(['name'=>'Đà Nẵng']);

        // create District
        // Hà nội
        App\District::create(['name'=>'Ba Đình', 'city_id'=>'1']);
        App\District::create(['name'=>'Ba Vì', 'city_id'=>'1']);
        App\District::create(['name'=>'Bắc Từ Liêm', 'city_id'=>'1']);
        App\District::create(['name'=>'Cầu Giấy', 'city_id'=>'1']);
        App\District::create(['name'=>'Chương Mĩ', 'city_id'=>'1']);
        App\District::create(['name'=>'Đan Phượng', 'city_id'=>'1']);
        App\District::create(['name'=>'Đông Anh', 'city_id'=>'1']);
        App\District::create(['name'=>'Đống Đa', 'city_id'=>'1']);
        App\District::create(['name'=>'Gia Lâm', 'city_id'=>'1']);
        App\District::create(['name'=>'Hà Đông', 'city_id'=>'1']);
        App\District::create(['name'=>'Hai Bà Trưng', 'city_id'=>'1']);
        App\District::create(['name'=>'Hoài Đức', 'city_id'=>'1']);
        App\District::create(['name'=>'Hoàn Kiếm', 'city_id'=>'1']);
        App\District::create(['name'=>'Long Biên', 'city_id'=>'1']);
        App\District::create(['name'=>'Mê Linh', 'city_id'=>'1']);
        App\District::create(['name'=>'Mỹ Đức', 'city_id'=>'1']);
        App\District::create(['name'=>'Nam Từ Liêm', 'city_id'=>'1']);
        App\District::create(['name'=>'Phúc Thọ', 'city_id'=>'1']);
        App\District::create(['name'=>'Phú Xuyên', 'city_id'=>'1']);
        App\District::create(['name'=>'Quốc Oai', 'city_id'=>'1']);
        App\District::create(['name'=>'Sóc Sơn', 'city_id'=>'1']);
        App\District::create(['name'=>'Tây Hồ', 'city_id'=>'1']);
        App\District::create(['name'=>'Thạch Thất', 'city_id'=>'1']);
        App\District::create(['name'=>'Thanh Oai', 'city_id'=>'1']);
        App\District::create(['name'=>'Thanh Trì', 'city_id'=>'1']);
        App\District::create(['name'=>'Thanh Xuân', 'city_id'=>'1']);
        App\District::create(['name'=>'Thường Tín', 'city_id'=>'1']);
        App\District::create(['name'=>'Tx Sơn Tây', 'city_id'=>'1']);
        App\District::create(['name'=>'Ứng Hòa', 'city_id'=>'1']);

        // Hồ Chí Minh
        App\District::create(['name'=>'Bình Chánh', 'city_id'=>'2']);
        App\District::create(['name'=>'Bình Tân', 'city_id'=>'2']);
        App\District::create(['name'=>'Bình Thạnh', 'city_id'=>'2']);
        App\District::create(['name'=>'Cần Giờ', 'city_id'=>'2']);
        App\District::create(['name'=>'Củ Chi', 'city_id'=>'2']);
        App\District::create(['name'=>'Gò Vấp', 'city_id'=>'2']);
        App\District::create(['name'=>'Hóc Môn', 'city_id'=>'2']);
        App\District::create(['name'=>'Nhà Bè', 'city_id'=>'2']);
        App\District::create(['name'=>'Phú Nhuận', 'city_id'=>'2']);
        App\District::create(['name'=>'Quận 1', 'city_id'=>'2']);
        App\District::create(['name'=>'Quận 2', 'city_id'=>'2']);
        App\District::create(['name'=>'Quận 3', 'city_id'=>'2']);
        App\District::create(['name'=>'Quận 4', 'city_id'=>'2']);
        App\District::create(['name'=>'Quận 5', 'city_id'=>'2']);
        App\District::create(['name'=>'Quận 6', 'city_id'=>'2']);
        App\District::create(['name'=>'Quận 7', 'city_id'=>'2']);
        App\District::create(['name'=>'Quận 8', 'city_id'=>'2']);
        App\District::create(['name'=>'Quận 9', 'city_id'=>'2']);
        App\District::create(['name'=>'Quận 10', 'city_id'=>'2']);
        App\District::create(['name'=>'Quận 11', 'city_id'=>'2']);
        App\District::create(['name'=>'Quận 12', 'city_id'=>'2']);
        App\District::create(['name'=>'Tân Bình', 'city_id'=>'2']);
        App\District::create(['name'=>'Tân Phú', 'city_id'=>'2']);
        App\District::create(['name'=>'Thủ Đức', 'city_id'=>'2']);

        // Đà Nẵng
        App\District::create(['name'=>'Cẩm Lệ', 'city_id'=>'3']);
        App\District::create(['name'=>'Hải Châu', 'city_id'=>'3']);
        App\District::create(['name'=>'Hoàng Sa', 'city_id'=>'3']);
        App\District::create(['name'=>'Hòa Vang', 'city_id'=>'3']);
        App\District::create(['name'=>'Liên Chiểu', 'city_id'=>'3']);
        App\District::create(['name'=>'Ngũ Hành Sơn', 'city_id'=>'3']);
        App\District::create(['name'=>'Sơn Trà', 'city_id'=>'3']);
        App\District::create(['name'=>'Thanh Khê', 'city_id'=>'3']);


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
