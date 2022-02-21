@extends('layouts.dashboard')

@section('add_head_scripts')
    @include('pages.partials.head_scripts')
@endsection

@section('content')
    <reviews-page logged-user-id="{{ Auth::id() }}"></reviews-page>
@endsection
