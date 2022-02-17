@extends('layouts.app')

@section("content")

    <message-page doctor-id="{{Auth::user()->id}}"></message-page>

@endsection