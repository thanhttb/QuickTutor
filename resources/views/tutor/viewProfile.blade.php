@extends('layout')

@section('header')
    <title>Profile</title>
@stop

@section('content')
    @if($user->id == Auth::user()->id)
        <div class="form-group">
            <a href= {{ url('/edit'.'/'.Auth::user()->id)}} class="btn btn-primary">Edit Profile</a>
        </div>
    @endif

    <div id="profile-info">
        
    </div>

@stop
