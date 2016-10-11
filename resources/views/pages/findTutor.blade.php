@extends('layout')

@section('header')
    <title>Find Tutor</title>
    <meta name="_token" content="{!! csrf_token() !!}"/>
@stop


@section('content')
    <form class="form-horizontal" action="/findTutor" method="post">
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
                <option value="">Chọn Thành Phố</option>
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
            <button type="submit" name="button" id="submitBtn" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
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
                placeholder: 'Môn học',
                width: '100%'
            });
            $("#districts").select2({
                placeholder: 'Quận/Huyện',
                width: '100%'
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
