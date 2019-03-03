@extends('layout')

@section('content')
    <div class="d-flex flex-warp divborder divborder-default my-3">
        <div class="flex-fill">
            <h3 class="text-muted">Laman Masuk</h3>
        </div>
    </div>

    <div class="d-flex divborder divborder-default my-3 mr-auto">
        <form method="POST" action="{{ route('login') }}" class="m-3">
            {{ csrf_field() }}

            <div class="d-flex flex-row form-group">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

            </div>

            <div class="d-flex flex-row form-group">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

            </div>


            <div class="d-flex flex-row-reverse form-group">
                <div class="">
                    <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Login"><i class="fas fa-sign-in-alt"></i>
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection