@extends('layouts.app')

@section('add_head_scripts')
    @include('pages.partials.head_scripts')
@endsection

@section('content')
    {{-- <reviews-section></reviews-section> --}}
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-3">
                <img @if (!$user->userDetail->img_path) src="/img/avatar_placeholder.jpeg"
                @else
                    src="{{ asset('storage/' . $user->userDetail->img_path) }}" @endif
                    class="w-100 mb-3 mb-md-0" alt="doctor-profile-img">
            </div>
            <div class="col-12 col-md-9 ps-3">
                <h2 class="card-title fw-bold">{{ $user->first_name . ' ' . $user->last_name }} </h2>
                <p class="card-text">Numero di Telefono: {{ $user->userDetail->phone }}</p>
                <p class="card-text">Email: {{ $user->email }}</p>
                <stars-rating :ratings={{ $media }}>Media delle recensioni:</stars-rating>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#contact_doctor">
                    <a class="text-decoration-none" href="#" role="button">Contatta il dottore</a>
                </button>
                @include('pages.partials.modal_contact_doctor')
                @include('pages.partials.modal_sent_message')
            </div>
        </div>
        <div class="mt-3 mb-4">
            <div class="d-flex align-items-center gap-3 mb-2">
                <h3 class="fw-bold mb-0" style="display: inline-block">Biografia</h3>
                @if ($user->userDetail->cv_path)
                    <button type="button" class="btn btn-outline-primary">
                        <a href="{{ asset('storage/' . $user->userDetail->cv_path) }}"
                            download="{{ $user->first_name . '_' . $user->last_name . '_curriculum' }}"
                            class="text-decoration-none">
                            Download CV
                        </a>
                    </button>
                @endif
            </div>
            <p style="font-size: 20px">{{ $user->userDetail->bio }}</p>
        </div>


        <div class="mb-4">
            <h3 class="fw-bold">Servizi Offerti</h3>
            <ul class="list-group py-3 rounded rounded-3">
                @foreach ($user->services as $key => $service)
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center py-0 pe-0 {{ $key % 2 !== 0 ? 'list-group-item-primary' : '' }}">
                        <div class=" flex-grow-1 ">
                            {{ $service->name }}
                        </div>
                        <span class="badge bg-primary rounded-pill p-2 me-3">€ {{ $service->pivot->price }}</span>
                        <button class="btn btn-primary text-white">Prenota</button>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mb-4">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <h3 class="fw-bold">Recensioni {{ $reviews->total() }}</h3>
                </div>
                <div>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#modal_review">
                        <a class="text-decoration-none" href="#" role="button">Scrivi una recensione</a>
                    </button>
                </div>
                @include('pages.partials.modal_write_review')
                {{-- @include('pages.partials.modal_sent_message') --}}

            </div>

            <div class="d-flex">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($reviews as $review)
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $review->title }}</h5>
                                    <h5 class="card-title">From: {{ $review->reviewer_name }}</h5>

                                    {{-- <h5 class="card-title">Voto: {{ $review->rating }}</h5> --}}

                                    <stars-rating :ratings={{ $review->rating }}></stars-rating>

                                    <p class="card-text">{{ Str::limit($review->content, 100, '...') }}</p>
                                    <p class="card-text">Recensito il {{ $review->created_at->format('d F y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center py-4 mb-0">
                {!! $reviews->links() !!}
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
    // console.log(window.modalReview);
    window.addEventListener('DOMContentLoaded', (event) => {
        @if (count($errors) > 0 && $errors->first('type') === 'Message')
            window.modalMessage.show();
            // });
        @elseif(count($errors) > 0 && $errors->first('type') === 'Review')
            window.modalReview.show();
        @elseif(Session::get('success'))
            // window.addEventListener('DOMContentLoaded', (event) => {
            console.log('prova');
            window.modalSuccess.show();
        @endif
    });
</script>
