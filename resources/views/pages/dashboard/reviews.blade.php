@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Dashboard -> review</h1>
    </div>
    <reviews-page logged-user-id="{{ Auth::id() }}">
    </reviews-page>
@endsection
