@extends('layout')

@section('content')

<div class="d-flex flex-warp divborder divborder-default my-3">
    <div class="flex-fill">
        <h3 class="text-muted">Pengumuman</h3>
    </div>
</div>

<div class="d-flex flex-wrap justify-content-between divborder divborder-default my-3">
    @foreach ($mpengumuman as $pengumuman)
    <div class="shadow bg-white rounded my-3">
        <div class="card h-100" style="width: 18rem;">
            <div class="card-header bg-success">
                <h5 class="card-title">{{ $pengumuman->judulpengumuman }}</h5>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">{{ $pengumuman->created_at }} oleh {{ $pengumuman->email }}</h6>
                <p class="card-text">{{ $pengumuman->ringkasanpengumuman }}</p> 
            </div>
            <div class="card-footer text-muted">
            <a class="btn btn-success" href="{{ route('administrator.pengumuman.downloadPengumuman', $pengumuman->judulpengumuman) }}" target="_blank"><i class="fas fa-scroll" data-toggle="tooltip" title="Download Pengumuman Ini"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

