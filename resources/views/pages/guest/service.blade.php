@extends('layouts.app')

@section('content')
<jumbo-service></jumbo-service>
<div class="container">
    <h2>Di cosa si tratta?</h2>

    <description-block></description-block>
    {{-- @dd(json_encode($doctorList)); --}}
    <h2>I nostri migliori dottori:</h2>
    <doctor-page-carousel doctor-list-prop="{{ json_encode($doctorList) }}">

    </doctor-page-carousel>
</div>
@endsection
