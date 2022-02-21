@extends("layouts.dashboard")

@section('content')
    <conversations-page conversations-prop="{{ json_encode($conversations) }}" logged-user-id="{{ Auth::user()->id }}"></conversations-page>
@endsection