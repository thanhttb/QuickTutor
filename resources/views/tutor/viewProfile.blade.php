@extends('layouts.app')

@section('header')
    <title>Profile</title>
@stop

@section('content')
    @if($user->id == Auth::user()->id)
        <div class="btn-group btn-group-justified">
                <a href= {{ url('/edit'.'/'.Auth::user()->id)}} class="btn btn-primary btn-block">Edit/Create Profile</a>
                <a href= {{ url('/delete'.'/'.Auth::user()->id)}} class="btn btn-primary btn-block">Delete Profile</a>
        </div>
    @endif
    <hr>
    @if($user->profile)
        <?php $profile = $user->profile; ?>
        <div id="profile-info">
            <h2 class="modal-title text-center">THÔNG TIN GIA SƯ</h2>
            <hr>
            <div class="col-sm-6">
                <img src= {{$profile->linkAvatar}} class="img-responsive img-centered img-rounded" alt="">
            </div>
            <div class="col-sm-6">
              <h4 class="text-center text-success">THÔNG TIN CÁ NHÂN</h4>
              <p>Họ và tên: {{$profile->name}}</p>
              <p>Sinh ngày: <?php $x = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $profile->birthDay) ?> {{$x->day}}/{{$x->month}}/{{$x->year}}</p>
              <p>Giới tính: {{$profile->gender}}</p>
              <p>Email: {{$profile->email}}</p>
              <p>Điện thoại: {{$profile->phone1}} - {{$profile->phone2}}</p>
              <p>Facebook: {{$profile->facebook}}</p>
              <p>Địa chỉ nhà: {{$profile->address}}</p>
              <p>Trường đại học: {{$profile->school}}</p>
            </div>
            <div class="form-group col-sm-12">
              <hr>
              <h4 class="text-center text-success">GIỚI THIỆU</h4>
              <pre style="white-space:pre-line; word-break:break-word;"> {{$profile->bio}}</pre>
            </div>
            <div class="form-group col-sm-12">
              <hr>
              <h4 class="text-center text-success">THÔNG TIN GIẢNG DẠY</h4>
              <br>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label class="control-label" for="times" >Thời gian rảnh</label>
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
                              <td><input name="times[]" id="time1" type="checkbox" disabled value="1"></td>
                              <td><input name="times[]" id="time2" type="checkbox" disabled value="2"></td>
                              <td><input name="times[]" id="time3" type="checkbox" disabled value="3"></td>
                            </tr>
                            <tr>
                              <td>Thứ 3</td>
                              <td><input name="times[]" id="time4" type="checkbox" disabled value="4"></td>
                              <td><input name="times[]" id="time5" type="checkbox" disabled value="5"></td>
                              <td><input name="times[]" id="time6" type="checkbox" disabled value="6"></td>
                            </tr>
                            <tr>
                              <td>Thứ 4</td>
                              <td><input name="times[]" id="time7" type="checkbox" disabled value="7"></td>
                              <td><input name="times[]" id="time8" type="checkbox" disabled value="8"></td>
                              <td><input name="times[]" id="time9" type="checkbox" disabled value="9"></td>
                            </tr>
                            <tr>
                              <td>Thứ 5</td>
                              <td><input name="times[]" id="time10" type="checkbox" disabled value="10"></td>
                              <td><input name="times[]" id="time11" type="checkbox" disabled value="11"></td>
                              <td><input name="times[]" id="time12" type="checkbox" disabled value="12"></td>
                            </tr>
                            <tr>
                              <td>Thứ 6</td>
                              <td><input name="times[]" id="time13" type="checkbox" disabled value="13"></td>
                              <td><input name="times[]" id="time14" type="checkbox" disabled value="14"></td>
                              <td><input name="times[]" id="time15" type="checkbox" disabled value="15"></td>
                            </tr>
                            <tr>
                              <td>Thứ 7</td>
                              <td><input name="times[]" id="time16" type="checkbox" disabled value="16"></td>
                              <td><input name="times[]" id="time17" type="checkbox" disabled value="17"></td>
                              <td><input name="times[]" id="time18" type="checkbox" disabled value="18"></td>
                            </tr>
                            <tr>
                              <td>Chủ nhật</td>
                              <td><input name="times[]" id="time19" type="checkbox" disabled value="19"></td>
                              <td><input name="times[]" id="time20" type="checkbox" disabled value="20"></td>
                              <td><input name="times[]" id="time21" type="checkbox" disabled value="21"></td>
                            </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
              <div class="col-sm-6">
                  <strong>Các môn có thể dạy</strong>
                  <ul>
                      @foreach($profile->subjects as $subject)
                          <li>{{$subject->name}}</li>
                      @endforeach
                  </ul>
                  <hr>
                  <p><strong>Giá tiền:</strong> {{$profile->price}} - 1 giờ</p>
                  <hr>
                  <strong>Có thể dạy ở những địa điểm sau:</strong>
                  <ul>
                      @foreach($profile->districts as $district)
                          <li>{{$district->name}} ({{$district->city->name}})</li>
                      @endforeach
                  </ul>
              </div>
        </div>
    @endif

@stop

@section('footer')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".btn").hover(function(){
                $(this).css({"background-color": "#99c93d", "color": "#2c3e50"});
            }, function(){
                $(this).css({"background-color": "#2c3e50", "color": "#ffffff"});
            });
        });
        @foreach($profile->times as $time)
            var idtime = "#time" + {{$time->id}};
            $(idtime).attr("checked", true);
        @endforeach
    </script>
@stop
