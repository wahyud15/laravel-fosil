@extends('layout')

@section('content')

<div class="d-flex flex-warp divborder divborder-default my-3">
    <div class="flex-fill">
        <h3 class="text-muted">Diskusi - Tema Diskusi</h3>
    </div>
</div>

<!-- <div class="d-flex flex-warp divborder divborder-default my-3">
    <form class="flex-fill">
        <div class="form-group shadow my-2">
            <input type="search" class="form-control" placeholder="Search Tema Diskusi">
        </div>
    </form>
</div> -->

<div class="d-flex flex-wrap justify-content-between divborder divborder-default my-3">
@foreach ($mruangdiskusi as $ruangdiskusi)
    <div class="shadow bg-white rounded my-3">
        <div class="bd-highlight">
            <div class="card" style="width: 18rem;">
                <div class="card-header bg-success shadow">
                    <h5 class="card-title">{{ $ruangdiskusi->judulruangdiskusi }}</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">{{ $ruangdiskusi->created_at }} oleh {{ $ruangdiskusi->email }}</h6>
                    <p class="card-text">{{ $ruangdiskusi->ringkasanruangdiskusi }}</p> 
                </div>
                <div class="card-footer text-muted">
                    <a class="btn btn-success" href="{{ route('ruangdiskusi.gotoRuangdiskusi', $ruangdiskusi->judulruangdiskusi) }}" target="_blank"><i class="fas fa-location-arrow" data-toggle="tooltip" title="Menuju Ruang Diskusi"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
</div>
@endsection