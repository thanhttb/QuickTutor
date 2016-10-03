@extends('layout')

@section('header')
    <title>Edit your profile</title>
@stop

@section('content')
    <form>
        <label for="flip-checkbox-1">Flip toggle switch checkbox:</label>
        <input type="checkbox" data-role="flipswitch" name="flip-checkbox-1" id="flip-checkbox-1">
    </form>
@stop
