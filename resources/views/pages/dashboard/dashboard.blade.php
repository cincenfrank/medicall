@extends('layouts.dashboard')

@section('content')
<stats-page :raw-charts-data="{{ json_encode($rawChartsData) }}"></stats-page>
@endsection