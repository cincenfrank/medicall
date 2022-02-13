@extends('layouts.app')
@section('content')
    <div>
        {{-- Jumbo = (services id img_path) + (service id name ) --}}
        <div class="position relative"
            style="height: 500px; background-image:url(https://st.ilfattoquotidiano.it/wp-content/uploads/2019/09/25/Medici-1200.jpg)">
            <h2 class="position-absolute top-50 start-50 translate-middle mb-0">
                {{ $services->name }}
            </h2>
        </div>
        <div class="container">
            <div class="row">
                <p> $services -> description = <strong>{{ $services->description }}</strong></p>
            </div>
        </div>
    </div>
@endsection
