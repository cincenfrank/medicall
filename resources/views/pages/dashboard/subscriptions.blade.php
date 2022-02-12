@extends('layouts.app')

@section('content')

    <div class="d-flex">

        {{-- Sidebar --}}
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Sidebar</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home"></use>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#speedometer2"></use>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#table"></use>
                        </svg>
                        Orders
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid"></use>
                        </svg>
                        Products
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        Customers
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
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
                                            data-bs-target="#buyModal">
                                            Launch demo modal
                                        </button>
                                    </div>

                                    <div>
                                        <div class="modal fade" id="buyModal" tabindex="-1"
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
                                                            <div class="mb-3  align-items-center bg-danger">
                                                                <label for="price" class="form-label px-2">Show
                                                                    Subcription per prendere e mostrare il prezzo
                                                                    dell'elemento cliccato?</label>
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
