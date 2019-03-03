@extends('layout')

@section('content')

<div class="d-flex flex-warp divborder divborder-default my-3">
    <div class="flex-fill">
        <h3 class="text-muted">Arsip</h3>
    </div>
</div>

<div class="d-flex flex-wrap justify-content-between divborder divborder-default my-3" id="adminarsipcontainer">
    
    @foreach ($marsip as $arsip)
    <div class="shadow bg-white rounded my-3">
        <div class="bd-highlight">
            <div class="card" style="width: 18rem;">
                <div class="card-header bg-success">
                    <h5 class="card-title">{{ $arsip->judul }} </h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">{{ $arsip->created_at }} oleh {{ $arsip->email }}</h6>
                    <p class="card-text">{{ $arsip->ringkasan }}</p> 
                    <p style=""></p>
                </div>
                <div class="card-footer text-muted">
                    <a class="btn btn-success" href="{{ route('administrator.arsip.downloadArsip', $arsip->judul) }}" target="_blank"><i class="fa fa-download" data-toggle="tooltip" title="Download Arsip Ini"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection

