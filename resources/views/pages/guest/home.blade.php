@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Ciao da MediCall</h1>
        {{-- <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($reviews as $review)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $review->title }}</h5>
                            <p class="card-text fw-bolder">{{ $review->rating }}/5</p>
                            <p class="card-text fw-bolder fst-italic">{{ $review->reviewer_name }}</p>
                            <p class="card-text fst-italic">{{ $review->reviewer_email }}</p>

                            <p class="card-text fst-italic">{{ $review->user_id }}</p>

                            <p class="card-text">{{ $review->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div> --}}
    </div>
    <card-review></card-review>
@endsection
