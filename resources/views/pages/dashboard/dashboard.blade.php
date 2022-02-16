@extends('layouts.dashboard')

@section('content')
{{dd($chartsData)}}
<stats-page :chartsData="{{ json_encode($chartsData) }}"></stats-page>
@endsection