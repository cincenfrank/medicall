@extends('layouts.app')

@section('content')

{{-- <div style="position:relative"> --}}
{{-- <img src="/img/bg-login.jpg" style="width: 100%; max-height:60vh; object-fit: cover; position: absolute" alt="">
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div> --}}

{{-- <div class="card-body"> --}}
<login-register-page>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- <div class="form-group row"> --}}
        {{-- <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label> --}}

        {{-- <div class="col-md-6"> --}}
        <input placeholder="Nome" id="first_name" type="text" class="form-control my-2 @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
        @error('first_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input placeholder="Cognome" id="last_name" type="text" class="form-control my-2 @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

        @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input placeholder="Email" id="email" type="email" class="form-control my-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        {{-- </div>
            </div> --}}


        <input placeholder="Password" id="password" type="password" class="form-control my-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror


        <input placeholder="Conferma Password" id="password-confirm" type="password" class="form-control my-2" name="password_confirmation" required autocomplete="new-password">

        <div class="form-group row mb-0 mt-3 mb-2">
            <div class="col-md-12">
                <button type="submit" class="btn btn-custom-blue w-100">
                    {{ __('Registrati') }}
                </button>
            </div>
        </div>
        <small class="d-block text-center">Hai già un account? <a class="link-custom-blue" href="{{route('login')}}">Accedi</a></small>
    </form>
</login-register-page>
{{-- </div> --}}
{{-- </div>
            </div>
        </div>
    </div> --}}
{{-- </div> --}}
@endsection
