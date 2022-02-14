@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div>
                <img
                    src="https://www.ambulatoriobiomedica.it/wp-content/uploads/2013/05/111-1118645_chiropractic-provider-male-doctor-vector-390x260.jpg">
            </div>
            <div class="ps-3">
                <h5 class="card-title">{{ $user->first_name . ' ' . $user->last_name }} </h5>
                <p class="card-text bg-danger text-white">
                    {{-- CV PATH NULL --}}
                    {{ $user->userDetail->cv_path ? $user->userDetail->cv_path : '' }}</p>
                <p class="card-text">Numero di Telefono: {{ $user->userDetail->phone }}</p>
                <p class="card-text">Email: {{ $user->email }}</p>
                <p class="card-text bg-danger text-white">Media delle Recensioni...</p>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#contact_doctor">
                    <a class="" href="#" role="button">Contatta il dottore</a>
                </button>
                @include('pages.partials.modal_contact_doctor')
                {{-- conferma da finire --}}
                @include('pages.partials.modal_sent_message')
            </div>
        </div>
        <div class="mt-3">
            <h4>Biografia</h4>
            <p style="font-size: 20px">{{ $user->userDetail->bio }}</p>
        </div>


        <div class="">
            <h3>Servizi Offerti:</h3>
            {{-- @dd($user->services) --}}
            @foreach ($user->services as $servizio)
                <div class="row g-0 border align-items-center">
                    <div class="col-6 col-md-8">{{ $servizio->name }}</div>
                    {{-- Prendere la colonna price dalla tabella ponte --}}
                    <div class="col-2 col-md-2">€{{ $servizio->pivot->price }}</div>
                    <div class="col-3 col-md-2 btn btn-primary">Prenota</div>
                </div>
            @endforeach
        </div>

        <div class="">
            <div class="d-flex justify-content-between">
                <div>
                    <h3>Recensioni {{ $reviews->total() }} </h3>
                </div>
                <div>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#modal_review">
                        <a class="text-unstyled" href="#" role="button">Scrivi una recensione</a>
                    </button>
                </div>
                @include('pages.partials.modal_write_review')

            </div>

            <div class="d-flex">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($reviews as $review)
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $review->title }}</h5>
                                    <h5 class="card-title bg-danger text-white">Nome da definire (manca colonna DB)</h5>
                                    <h5 class="card-title">Voto: {{ $review->rating }}</h5>
                                    <p class="card-text">{{ Str::limit($review->content, 100, '...') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center py-2">
                {!! $reviews->links() !!}

            </div>
        </div>
    @endsection
