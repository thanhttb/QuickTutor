@extends('layouts.app')

@section('header')
    <title>Edit your profile</title>
@stop



@section('content')

    <form class="form-horizontal" action="/editProfile/save/{{ $profile->id }}" method="POST">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="col-sm-6">
            <h2 style="color:silver"><b>Thông tin cá nhân </b></h2>
            <hr>
            <div class="form-group">
              <label class="control-label col-sm-3" for="name" required>Họ và Tên</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="name" id="name" value= "{{$profile->name}}" placeholder="{{$profile->name}}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="email" >Email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" name="email" id="email" value= "{{$profile->email}}" placeholder="{{$profile->email}}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="phone1" >Phone 1</label>
              <div class="col-sm-9">
                <input type="tel" class="form-control" name="phone1" id="phone1" value= "{{$profile->phone1}}" placeholder="{{$profile->phone1}}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="phone2">Phone 2</label>
              <div class="col-sm-9">
                <input type="tel" class="form-control" name="phone2" id="phone2" value= "{{$profile->phone2}}" placeholder="{{$profile->phone2}}">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="facebook">Facebook</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="facebook" id="facebook" value= "{{$profile->facebook}}" placeholder="{{$profile->facebook}}">
              </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="gender">Giới tính</label>
                <div>
                    <label class="radio-inline">
                      <input type="radio" name="gender" value="nam" {{($profile->gender=='nam') ? 'checked':''}} >Nam
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="gender" value="nu" {{($profile->gender=='nữ') ? 'checked':''}}>Nữ
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="gender" value="other" {{($profile->gender=='other') ? 'checked':''}}>Other
                    </label>
                </div>
            </div>


            <div class="form-group">
                <label class = "control-label col-sm-3" for="birthDay">Ngày sinh</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="birthDay" name = "birthDay" value= {{$profile->birthDay}} required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="job">Nghề Nghiệp</label>
                <div>
                    <label class="radio-inline">
                      <input type="radio" name="job" value="hoc sinh" {{($profile->job =='hoc sinh') ? 'checked':''}}>Học sinh
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="job" value="sinh vien" {{($profile->job =='sinh vien') ? 'checked':''}}>Sinh viên
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="job" value="giang vien" {{($profile->job =='giang vien') ? 'checked':''}}>Giảng viên
                    </label>
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="address" >Địa chỉ</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="address" id="address" value= "{{$profile->address}}" placeholder="{{$profile->address}}">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="school">Trường Đại Học</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="school" id="school" value= "{{$profile->school}}" placeholder="{{$profile->school}}">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="bio" >Tiểu sử bản thân</label>
              <div class="col-sm-9">
                <textarea class="form-control" rows="5" name="bio" id="bio">{{$profile->bio}}</textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="linkAvatar">Link hình ảnh avatar</label>
              <div class="col-sm-9">
                <input type="url" class="form-control" name="linkAvatar" id="linkAvatar" value= "{{$profile->linkAvatar}}" placeholder="{{$profile->linkAvatar}}">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="linkVideo">Link video cá nhân (youtube)</label>
              <div class="col-sm-9">
                <input type="url" class="form-control" name="linkVideo" id="linkVideo" value= "{{$profile->linkVideo}}" placeholder="{{$profile->linkVideo}}">
              </div>
            </div>
        </div>

        <div class="col-sm-6">
            <h2 style="color:silver"><b>Thông tin giảng dạy</b></h2>
            <hr>

            <div class="form-group">
                <label class="control-label col-sm-3" for="subjects" >Môn học</label>
                <div class="col-sm-9">
                    <select class="js-example-basic-multiple js-states form-control" id="subjects" name="subjects[]" multiple="multiple">
                          @foreach($subjects as $subject)
                              <option value="{{$subject->id}}"@foreach($profile->subjects as $s) @if($subject->id == $s->id) selected="selected" @endif @endforeach><b>{{$subject->name}}</b></option>
                          @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="price">Tiền dạy tối thiểu 1 giờ</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" name="price" id="price" value= "{{$profile->price}}" placeholder="{{$profile->price}}" required>
              </div>
            </div>


        </div>

        <div class="col-sm-offset-5 col-sm-7">
            <button type="submit" name="button" class="btn btn-primary" id="submitBtn">Update profile</button>
        </div>
    </form>


@stop

@section('footer')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $("document").ready(function(){
            $("#subjects").select2({
                placeholder: 'Chọn môn học bạn dạy'
            });
            $("#birthDay").required;
        });

    </script>
@stop
