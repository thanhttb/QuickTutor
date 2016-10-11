@extends('layout')

@section('header')
    <title>Edit your profile</title>
    <meta name="_token" content="{!! csrf_token() !!}"/>
@stop

@section('content')

    <form class="form-horizontal" action="/editProfile/save/{{ $profile->id }}" method="POST">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="col-sm-6">
            <h2 style="color:silver"><b>Thông tin cá nhân </b></h2>
            <hr>
            <div class="form-group">
              <label class="control-label col-sm-3" for="active1">Active</label>
              <div class="col-sm-9">
                <input type="checkbox" class="form-control" name="active1" id="active1" {{($profile->active) ? 'checked':''}}>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="name">Họ và Tên</label>
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
                    <input type="date" class="form-control" id="birthDay" name = "birthDay" required value= {{$profile->birthDay}}>
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
                              <option value={{$subject->id}}@foreach($profile->subjects as $s) @if($subject->id == $s->id) selected="selected" @endif @endforeach>{{$subject->name}}</option>
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

            <div class="form-group">
                <label class="control-label col-sm-3" for="subjects" >Thành Phố (nơi dạy)</label>
                <div class="col-sm-9">
                    <select class="js-example-basic-single form-control" id="city_id" name="city_id" onChange="getDistrict(this.value);">
                        <option value="0">Chọn Thành Phố</option>
                        @foreach($cities as $city)
                            <option value= {{$city->id}} @if($city->id == $profile->city_id) selected="selected" @endif>{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="districts" >Quận/Huyện</label>
                <div class="col-sm-9">
                    <select class="js-example-basic-multiple js-states form-control" id="districts" name="districts[]" multiple="multiple">
                            @if($profile->city)
                                @foreach($profile->city->districts as $district)
                                    <option value={{$district->id}}@foreach($profile->districts as $s) @if($district->id == $s->id) selected="selected" @endif @endforeach>{{$district->name}}</option>
                                @endforeach
                            @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="times" >Thời gian dạy</label>
                <div class="col-sm-offset-3 col-sm-9">
                    <table class="table" name="times">
                        <thead>
                          <tr class="info">
                            <th>Ngày</th>
                            <th>Sáng</th>
                            <th>Chiều</th>
                            <th>Tối</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Thứ 2</td>
                            <td><input name="times[]" id="time1" type="checkbox" value="1"></td>
                            <td><input name="times[]" id="time2" type="checkbox" value="2"></td>
                            <td><input name="times[]" id="time3" type="checkbox" value="3"></td>
                          </tr>
                          <tr>
                            <td>Thứ 3</td>
                            <td><input name="times[]" id="time4" type="checkbox" value="4"></td>
                            <td><input name="times[]" id="time5" type="checkbox" value="5"></td>
                            <td><input name="times[]" id="time6" type="checkbox" value="6"></td>
                          </tr>
                          <tr>
                            <td>Thứ 4</td>
                            <td><input name="times[]" id="time7" type="checkbox" value="7"></td>
                            <td><input name="times[]" id="time8" type="checkbox" value="8"></td>
                            <td><input name="times[]" id="time9" type="checkbox" value="9"></td>
                          </tr>
                          <tr>
                            <td>Thứ 5</td>
                            <td><input name="times[]" id="time10" type="checkbox" value="10"></td>
                            <td><input name="times[]" id="time11" type="checkbox" value="11"></td>
                            <td><input name="times[]" id="time12" type="checkbox" value="12"></td>
                          </tr>
                          <tr>
                            <td>Thứ 6</td>
                            <td><input name="times[]" id="time13" type="checkbox" value="13"></td>
                            <td><input name="times[]" id="time14" type="checkbox" value="14"></td>
                            <td><input name="times[]" id="time15" type="checkbox" value="15"></td>
                          </tr>
                          <tr>
                            <td>Thứ 7</td>
                            <td><input name="times[]" id="time16" type="checkbox" value="16"></td>
                            <td><input name="times[]" id="time17" type="checkbox" value="17"></td>
                            <td><input name="times[]" id="time18" type="checkbox" value="18"></td>
                          </tr>
                          <tr>
                            <td>Chủ nhật</td>
                            <td><input name="times[]" id="time19" type="checkbox" value="19"></td>
                            <td><input name="times[]" id="time20" type="checkbox" value="20"></td>
                            <td><input name="times[]" id="time21" type="checkbox" value="21"></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-sm-offset-5 col-sm-7">
            <button type="submit" name="button" id="submitBtn" class="btn btn-primary">Update profile</button>
        </div>
    </form>

@stop

@section('footer')
    {{-- select2 --}}
    <link href="/css/select2.min.css" rel="stylesheet" />
    <script src="/js/select2.min.js"></script>
    {{-- bootstrap-switch --}}
    <link href="/css/bootstrap-switch.min.css" rel="stylesheet">
    <script src="/js/bootstrap-switch.min.js"></script>

    <script type="text/javascript">
        $("document").ready(function(){
            $("#subjects").select2({
                placeholder: 'Chọn môn học bạn dạy',
                width: '100%'
            });
            $("#districts").select2({
                placeholder: 'Các quận/huyện bạn dạy được',
                width: '100%'
            });
            $("#active1").bootstrapSwitch();
            @foreach($profile->times as $time)
                var idtime = "#time" + {{$time->id}};
                $(idtime).attr("checked", true);
            @endforeach
        });

        function getDistrict(val){
            if (val == 0) {
                $("#districts").html("");
                return;
            }
            function template(id, name) {
                var text = "<option value=" + id + ">" + name + "</option>";
                return text;
            }
            $.ajax({
            	//
                type: "post",
            	url: "/getDistrict",
                dataType: "json",
            	data: {
                    'city_id':val,
                    '_token': $('input[name=_token]').val()
                },
            	success: function(data){
                    var text = '';
                    data.forEach(function(val) {
                        text += template(val.id, val.name);
                    });
            		$("#districts").html(text);
                    console.log(data);
            	},
                error: function(xhr, status, error) {
                    console.log(status, error);
                }
            });
        }

    </script>
    <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>
@stop
