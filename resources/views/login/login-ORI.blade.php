@extends('layout')

@section('content')
    <div class="d-flex flex-warp divborder divborder-default my-3">
        <div class="flex-fill">
            <h3 class="text-muted">Laman Masuk</h3>
        </div>
    </div>

    <div class="d-flex divborder divborder-warning my-3">
        <form method="POST" action="{{url('login')}}" class="my-3 mx-5">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username">
                @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif

            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form> 
    </div>

@endsection