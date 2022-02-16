@extends('layouts.app')

@section('content')

<login-register-page>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-group row mb-0 mt-3 mb-2">
            <div class="col-md-12">
                <button type="submit" class="btn btn-custom-blue w-100">
                    {{ __('Invia link di reset password') }}
                </button>
            </div>
        </div>
    </form>
</login-register-page>
@endsection
