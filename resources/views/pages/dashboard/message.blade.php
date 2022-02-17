@extends('layouts.dashboard')

@section("content")

    <message-page doctor-id="{{Auth::user()->id}}"></message-page>

@endsection