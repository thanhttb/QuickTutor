@extends('layout')


@section('content')
    <form>
        <fieldset data-role="controlgroup" data-theme="b" data-type="horizontal">
            <legend>Horizontal:</legend>
            <input type="radio" name="radio-choice-t-6" id="radio-choice-t-6a" value="on" checked="checked">
            <label for="radio-choice-t-6a">One</label>
            <input type="radio" name="radio-choice-t-6" id="radio-choice-t-6b" value="off">
            <label for="radio-choice-t-6b">Two</label>
            <input type="radio" name="radio-choice-t-6" id="radio-choice-t-6c" value="other">
            <label for="radio-choice-t-6c">Three</label>
        </fieldset>
    </form>
@stop
