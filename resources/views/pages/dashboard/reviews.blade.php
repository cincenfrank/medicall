@extends('layouts.app')
@section('add_head_scripts')
    @include('pages.partials.head_scripts')
@endsection
@section('content')
    <div class="container">
        <h1>Dashboard -> review</h1>
    </div>
    <reviews-page logged-user-id="{{ Auth::id() }}">
    </reviews-page>
@endsection
