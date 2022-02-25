@extends('layouts.app')
@section('add_head_scripts')
    @include('pages.partials.head_scripts')
@endsection
@section('content')
{{-- Import Vue Page Component  --}}
<search-page query="{{$query}}"></search-page>
@endsection
