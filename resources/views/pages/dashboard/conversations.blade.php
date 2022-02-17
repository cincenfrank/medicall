{{-- navbar --}}
@extends("layouts.dashboard")

@section("content")
{{-- portiamo la pagina Vue  --}}
<conversations-page logged-user-id="{{Auth::user()->id}}"></conversations-page>
@endsection



{{-- footer --}}
