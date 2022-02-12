@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div>
                <img
                    src="https://www.ambulatoriobiomedica.it/wp-content/uploads/2013/05/111-1118645_chiropractic-provider-male-doctor-vector-390x260.jpg">
            </div>
            <div class="w-50">
                <h5 class="card-title">{{ $user->first_name . ' ' . $user->last_name }} </h5>
                <p class="card-text">Scarica CV: {{ $user->userDetail->cv_path }}</p>
                <p class="card-text">Numero di Telefono: {{ $user->userDetail->phone }}</p>
                <p class="card-text">Recensioni...</p>
                <a class="btn btn-outline-primary" href="#" role="button">Contatta il dottore</a>
            </div>
        </div>
        <div class="mt-3">
            <h4>Biografia</h4>
            <p style="font-size: 20px">{{ $user->userDetail->bio }}</p>
        </div>


        <div class="bg-primary w-50">
            @foreach ($user->services as $servizio)
                <h3>{{ $servizio->name }}</h3>
            @endforeach
        </div>


    </div>
@endsection
