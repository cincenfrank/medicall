@extends('layouts.dashboard')

@section('content')
<form action="{{ route('dashboard.profileUpdate') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("put")
    <div class="row">
        <div class=" col-lg-4">
            <img class="w-100" src="/img/bg-login.jpg" alt="">
        </div>
        <div class="col-lg-8">

            <div class="mb-3">
                <label for="first_name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="first_name" value="{{ $user->first_name }}" name="first_name">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Cognome</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="phone" value="{{ $user->userDetail->phone }}" name="phone">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="available" name="available" {{-- se l´availble e´´ zero(falso) spuntami la checkbox --}} @if (!$user->userDetail->available) checked @endif>
                <label class="form-check-label" for="available">In vacanza</label>
            </div>

            <div class="mb-3">
                <label for="cv_path" class="form-label">Aggiungi Cv</label>
                <input class="form-control" type="file" id="cv_path" name="cv_path">
            </div>

            <div class="mb-3">
                <label for="img_path" class="form-label">Aggiungi Immagine</label>
                <input class="form-control" type="file" id="img_path" name="img_path">
            </div>

        </div>
    </div>

    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="bio" name="bio" style="height: 100px">{{ $user->userDetail->bio }}</textarea>
        <label for="bio">Biografia</label>
        <button type="submit" class="btn btn-success">Salva</button>
    </div>

</form>

<div class="">
    <div class="d-flex">
        <h2>Servizi</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addService">
            Aggiungi nuovo servizio
        </button>
    </div>
    @include('pages.partials.modal_add_service')
    <ul class="list-group">
        @foreach ($user->services as $service)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class=" flex-grow-1 ">
                {{$service->name}}
            </div>
            <span class="badge bg-primary rounded-pill me-2">€ {{$service->pivot->price}}</span>
            <form action="{{route('dashboard.deleteDoctorService', ['serviceId' => $service->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class=" btn text-white btn-danger">Elimina</button>
            </form>
        </li>
        @endforeach
    </ul>
</div>

</div>
@endsection
