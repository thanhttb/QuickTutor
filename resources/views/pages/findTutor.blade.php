@extends('layouts.app')

@section('header')
    <title>Find Tutor</title>
    <meta name="_token" content="{!! csrf_token() !!}"/>
@stop


@section('content')
    <div class="container">
        <form class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group col-sm-2">
                <select class="js-example-basic-multiple js-states form-control" id="subjects" name="subjects[]" multiple="multiple">
                     @foreach($subjects as $subject)
                          <option value={{$subject->id}}>{{$subject->name}}</option>
                     @endforeach
                </select>
            </div>

            <div class="form-group col-sm-2">
                <select class="form-control" id="city_id" name="city_id" onChange="getDistrict(this.value);">
                    <option value="">Thành Phố</option>
                    @foreach($cities as $city)
                        <option value= {{$city->id}}>{{$city->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-sm-3">
                <select class="js-example-basic-multiple js-states form-control" id="districts" name="districts[]" multiple="multiple"></select>
            </div>

            <div class="form-group col-sm-2">
                <select class="form-control" id="job" name="job">
                    <option value="">Chức danh</option>
                    <option value= "hoc sinh">Học sinh</option>
                    <option value= "sinh vien">Sinh viên</option>
                    <option value= "giang vien">Giảng viên</option>
                </select>
            </div>
            <div class="form-group col-sm-2">
                <select class="form-control" id="gender" name="gender">
                    <option value="">Giới tính</option>
                    <option value= "nam">Nam</option>
                    <option value= "nu">Nữ</option>
                    <option value= "other">Other</option>
                </select>
            </div>
            <div class="form-group col-sm-2">
                <button type="button" name="button" id="submitBtn" class="btn btn-primary" onclick="getTutor()"><span class="glyphicon glyphicon-search"></span></button>
            </div>
        </form>



        <div class="result" id="result">

        </div>
    </div>
@stop


@section('footer')
    <script type="text/javascript">
        $("document").ready(function(){
            $("#subjects").select2({
                placeholder: 'Môn học',
                width: '100%'
            });
            $("#districts").select2({
                placeholder: 'Quận/Huyện',
                width: '100%'
            });
            $(".btn").hover(function(){
                $(this).css({"background-color": "#99c93d", "color": "#2c3e50"});
            }, function(){
                $(this).css({"background-color": "#2c3e50", "color": "#ffffff"});
            });
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
        function getTutor(){
            // console.log($("#city_id").val());
            function template(name, job) {
                var text = "<h2>" + name + ": " + job + "<h2></br>";
                return text;
            }
            $.ajax({
                type: "post",
                url: "/findTutor",
                dataType: "json",
                data: {
                    'subjects': $("#subjects").val(),
                    'city_id': $("#city_id").val(),
                    'districts': $("#districts").val(),
                    'job': $("#job").val(),
                    'gender': $("#gender").val(),
                    '_token': $('input[name=_token]').val()
                },
                success: function(data){
                    var text = '';
                    data.forEach(function(val) {
                        text += template(val.name, val.job);
                    });
                    $("#result").html(text);
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
