@extends('layouts.app')
@section('content')
    <div class="d-flex">

        {{-- Sidebar --}}
        <sidebar></sidebar>
        {{-- right side --}}
        <div class="d-flex flex-grow-1 flex-column bg-dark text-white justify-content-center">
            <h3>Subscriptions</h3>
            <div class="d-flex justify-content-center bg-dark flex-grow-1 align-items-center">
                {{-- @dump($subscriptions) --}}
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($subscriptions as $subscription)
                        <div class="col">
                            <div class="card bg-primary" style="min-widht:300px">
                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                <div class="card-body">
                                    <h5 class="card-title">{{ $subscription->name }}</h5>
                                    <h5 class="card-title">{{ $subscription->price }}</h5>
                                    <h5 class="card-title">Tempo: {{ $subscription->duration_hours }} ore</h5>
                                    <p class="card-title">{{ $subscription->description }}</p>
                                    <div>
                                        {{-- <a class="btn btn-success btn-sm " href="#" role="button">Acquista</a> --}}
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#sub_{{ $subscription->id }}">
                                            Acquista
                                        </button>
                                    </div>
                                    <div>
                                        <div class="modal fade" id="sub_{{ $subscription->id }}" tabindex="-1"
                                            aria-labelledby="buyModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content bg-dark">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="buyModalLabel">Acquista</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5>Conferma il tuo acquisto</h5>
                                                        <form>
                                                            <div class="mb-3  align-items-center">
                                                                <label for="price" class="form-label mb-0 fs-3"
                                                                    id="test_prezzo">Prezzo:
                                                                    €{{ $subscription->price }}</label>
                                                            </div>
                                                            <div class="mb-3  align-items-center">
                                                                <label for="name"
                                                                    class="form-label ">Intestatario</label>
                                                                <input type="text" class="form-control" id="name"
                                                                    aria-describedby="emailHelp">
                                                            </div>

                                                            <div class="mb-3 align-items-center">
                                                                <label for="card" class="form-label ">Numero della
                                                                    Carta</label>
                                                                <input type="text" class="form-control" id="card"
                                                                    aria-describedby="emailHelp">
                                                            </div>

                                                            <div class="mb-3 d-flex  gap-5">
                                                                <div>
                                                                    <label for="card"
                                                                        class="form-label ">Scadenza</label>
                                                                    <input type="date" class="form-control" id="card"
                                                                        aria-describedby="emailHelp">
                                                                </div>
                                                                <div>
                                                                    <label for="card" class="form-label ">CVC</label>
                                                                    <input type="number" class="form-control" id="card"
                                                                        aria-describedby="emailHelp">
                                                                </div>
                                                            </div>
                                                            <div>

                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection
