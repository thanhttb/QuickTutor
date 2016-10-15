
@if(count($profiles))
    <section id="portfolio" class="bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Gia sư tìm thấy</h2>
                        <h3 class="section-subheading text-muted">Phù hợp với yêu cầu của bạn</h3>
                    </div>
                </div>
                <div class="row">
    				@foreach($profiles as $profile)
    					<div class="col-md-4 col-sm-6 portfolio-item">
    	                    <a href="#modal{{$profile->id}}" class="portfolio-link" data-toggle="modal">
    	                        <div class="portfolio-hover">
    	                            <div class="portfolio-hover-content">
    	                                <i class="fa fa-plus fa-3x"></i>
    	                            </div>
    	                        </div>
                                <img class="profile-img" src= {{$profile->linkAvatar}}  alt="">
    	                    </a>
    	                    <div class="portfolio-caption">
    	                        <h4>{{$profile->name}} - {{$year = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $profile->birthDay)->year}}</h4>
    	                        <p class="text-muted"> Giá: {{$profile->price}}/giờ</p>
    	                    </div>
    	                </div>
    				@endforeach
                </div>
            </div>
    </section>
    {{$profiles->links()}}
    @foreach($profiles as $profile)
        <div class="modal modal-fullscreen fade" id="modal{{$profile->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 <h2 class="modal-title text-center">THÔNG TIN GIA SƯ</h2>
              </div>
              <div class="modal-body row">
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
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    @endforeach
@else
    <section id="portfolio" class="bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Không tìm thấy kết quả nào</h2>
                        <h3 class="section-subheading text-muted">Phù hợp với yêu cầu của bạn</h3>
                    </div>
                </div>
            </div>
    </section>
@endif
<script type="text/javascript">
@foreach($profiles as $profile)
    @foreach($profile->times as $time)
        var idtime = "#modal" + {{$profile->id}} + " #time" + {{$time->id}};
        $(idtime).attr("checked", true);
    @endforeach
@endforeach


</script>
