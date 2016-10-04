@extends('layouts.app')

@section('header')
    <title>Profile</title>
@stop

@section('content')
    @if($user->id == Auth::user()->id)
        <div class="form-group col-sm-6">
            <a href= {{ url('/edit'.'/'.Auth::user()->id)}} class="btn btn-primary">Edit/Create Profile</a>
        </div>
        <div class="form-group col-sm-6">
            <a href= {{ url('/delete'.'/'.Auth::user()->id)}} class="btn btn-primary">Delete Profile</a>
        </div>
    @endif

    <div id="profile-info">
        <h1>Show profile here</h1>
    </div>
@stop
