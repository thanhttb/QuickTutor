@extends('layouts.app')

@section('header')
    <title>Find Tutor</title>
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link href="/css/Hongportfolio.css" rel="stylesheet">

    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/Hongmodal.css" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'> --}}
@stop


@section('content')
    <div class="container-fluid">
        <div class="col-sm-offset-1 col-sm-12">
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
                <div class="form-group col-sm-1">
                    <button type="button" name="button" id="submitBtn" class="btn btn-primary" onclick="getTutor(1)"><span class="glyphicon glyphicon-search"></span></button>
                </div>
            </form>
        </div>

        <div class="col-sm-12" id="result">

        </div>
    </div>
@stop


@section('footer')
    <script src="/js/Hongmodal.js" charset="utf-8"></script>
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
                    // console.log(data);
                },
                error: function(xhr, status, error) {
                    console.log(status, error);
                }
            });
        }
        function getTutor(page){
            $.ajax({
                type: "post",
                url: "/findTutor?page=" + page,
                data: {
                    'subjects': $("#subjects").val(),
                    'city_id': $("#city_id").val(),
                    'districts': $("#districts").val(),
                    'job': $("#job").val(),
                    'gender': $("#gender").val(),
                    '_token': $('input[name=_token]').val()
                },
                success: function(data){
                    $("#result").html(data);
                    var cw = $('.profile-img').width();
                    $('.profile-img').css({'height':0.7*cw+'px'});
                    // console.log(data);
                },
                error: function(xhr, status, error) {
                    console.log(status, error);
                }
            });
        }
        $(window).resize(function(){
            var cw = $('.profile-img').width();
            $('.profile-img').css({'height':0.7*cw+'px'});
        });

        $(window).on('hashchange',function(){
			page = window.location.hash.replace('#','');
			getTutor(page);
		});
		$(document).on('click','.pagination a', function(e){
			e.preventDefault();
			var page = $(this).attr('href').split('page=')[1];
			location.hash = page;
		});
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>
@stop
