@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

<div class="card-body"> --}}
    <login-register-page>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- <div class="form-group row"> --}}
            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

            {{-- <div class="col-md-6"> --}}
            <input placeholder="Email" id="email" type="email" class="form-control my-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            {{-- </div> --}}
            {{-- </div> --}}

            {{-- <div class="form-group row"> --}}
            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

            {{-- <div class="col-md-6"> --}}
            <input placeholder="Password" id="password" type="password" class="form-control my-3 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            {{-- </div> --}}
            {{-- </div> --}}

            <div class="form-group d-flex justify-content-between my-2">
                {{-- <div class="col-md-6 offset-md-4"> --}}
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                @if (Route::has('password.request'))
                <a class="link-custom-blue" href="{{ route('password.request') }}">
                    {{ __('Password dimenticata?') }}
                </a>
                @endif
                {{-- </div> --}}
            </div>

            <div class="form-group row mb-0 mt-3 mb-2">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-custom-blue w-100">
                        {{ __('Accedi') }}
                    </button>
                </div>
            </div>
            <small class="d-block text-center">Non hai ancora un account? <a class="link-custom-blue" href="{{route('register')}}">Registrati</a></small>

        </form>
    </login-register-page>
    {{-- </div>
            </div>
        </div>
    </div>
</div> --}}
    @endsection
