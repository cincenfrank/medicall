{{-- navbar --}}
@extends("layouts.dashboard")

@section('content')
    {{-- portiamo la pagina Vue --}}
    <conversations-page conversations-prop="{{ json_encode($conversations) }}" logged-user-id="{{ Auth::user()->id }}">
    </conversations-page>
@endsection



{{-- footer --}}
