@extends('layouts.dashboard')

@section('add_head_scripts')
@include('pages.partials.head_scripts')
@endsection

@section('content')
<div class="container">
    <h1 class="px-5 py-3 mb-0">Ciao {{ Auth::user()->first_name }} benvenuto nella tua pagina personale</h1>
    <stats-page :raw-charts-data="{{ json_encode($rawChartsData) }}"></stats-page>
</div>
@endsection
