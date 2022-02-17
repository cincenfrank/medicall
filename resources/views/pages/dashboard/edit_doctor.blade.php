@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('dashboard.profileUpdate') }}" method="POST">
        @csrf
        @method("put")
        <div class="row">
            <div class=" col-lg-4">
                <img class="w-100" src="/img/bg-login.jpg" alt="">
            </div>
            <div class="col-lg-8">

                <div class="mb-3">
                    <label for="first_name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="first_name" value="{{ $user->first_name }}"
                        name="first_name">
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Cognome</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        value="{{ $user->last_name }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="phone" value="{{ $user->userDetail->phone }}"
                        name="phone">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="available" name="available" {{-- se l´availble e´´ zero(falso) spuntami la checkbox --}}
                        @if (!$user->userDetail->available) checked @endif>
                    <label class="form-check-label" for="available">In vacanza</label>
                </div>

                <div class="mb-3">
                    <label for="cv_path" class="form-label">Aggiungi Cv</label>
                    <input class="form-control" type="file" id="cv_path" name="cv_path">
                </div>

            </div>
        </div>

        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="bio" name="bio"
                style="height: 100px">{{ $user->userDetail->bio }}</textarea>
            <label for="bio">Biografia</label>
            <button type="submit" class="btn btn-success">Salva</button>
        </div>

    </form>

    </div>
@endsection
