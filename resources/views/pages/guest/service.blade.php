@extends('layouts.app')

@section('content')
    <jumbo-service></jumbo-service>
    <description-block></description-block>
    {{-- @dd(json_encode($doctorList)); --}}
    <doctor-page-carousel doctor-list-prop="{{ json_encode($doctorList) }}">

    </doctor-page-carousel>
@endsection
