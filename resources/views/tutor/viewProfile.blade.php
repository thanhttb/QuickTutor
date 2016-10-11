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

    <div id="profile-info">
        <h1>Show profile here</h1>
    </div>
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

    </script>
@stop
