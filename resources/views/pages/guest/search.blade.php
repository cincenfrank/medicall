@extends('layouts.app')
@section('content')
{{-- Import Vue Page Component  --}}
<search-page query="{{$query}}"></search-page>
@endsection
