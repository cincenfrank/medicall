@extends('layouts.dashboard')

@section('add_head_scripts')
@include('pages.partials.head_scripts')
@endsection

@section('content')
    <stats-page :raw-charts-data="{{ json_encode($rawChartsData) }}"></stats-page>
@endsection