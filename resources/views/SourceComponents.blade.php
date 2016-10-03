@extends('layout')

@section('header')
    <title>Add & Edit Component (Admin)</title>
@stop

@section('content')
    <div class="jumbotron">
        <div id="subject">
            <h3>Subject</h3>
            <ul>
                @foreach($subjects as $subject)
                    <li>{{$subject->name}}</li>
                @endforeach
            </ul>
        </div>
        {{-- <button type="button" name="button">add</button> --}}
    </div>

    <div class="jumbotron">
        <h3>Spare Time</h3>
        <ul>
            @foreach($spareTimes as $spareTime)
                <li>{{$spareTime->day.': '.$spareTime->session}}</li>
            @endforeach
        </ul>
    </div>

    <div class="jumbotron">
        <h3>Location</h3>
        <ul>
            @foreach($cities as $city)
                <h4>{{$city->name}}</h4>
                @foreach($city->districts as $district)
                    <li>{{$district->name}}</li>
                @endforeach
            @endforeach
        </ul>
    </div>
@stop
