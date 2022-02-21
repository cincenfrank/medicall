@extends('layouts.dashboard')

@section('content')
    <message-page message-prop="{{ json_encode($message) }}" doctor-id="{{ Auth::user()->id }}"></message-page>
@endsection
