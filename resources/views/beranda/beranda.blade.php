@extends('layout')

@section('content')

<div class="d-flex flex-warp divborder divborder-default my-3">
    <div class="flex-fill">
        <h3 class="text-muted">Beranda</h3>
    </div>
</div>

<div class="d-flex flex-warp justify-content-between divborder">
    <div class="shadow bg-white rounded my-3">
        <div class="card h-100" style="width: 18rem;">
            <div class="card-header bg-success">
                <h5 class="card-title">Pengumuman</h5>
            </div>
            <div class="card-body">
            <span class="badge badge-danger">42</span> Pengumuman Belum Dibaca
            </div>
            <div class="d-flex flex-row-reverse card-footer text-muted">
                <!-- <a href="#" class="card-link btn btn-primary">Card link</a> -->
                <a href="#" class="card-link btn btn-success" data-toggle="tooltip" title="Menuju Pengumuman"><i class="fas fa-external-link-alt"></i></a>
            </div>
        </div>
    </div>

    <div class="shadow bg-white rounded my-3">
        <div class="card  h-100" style="width: 18rem;">
            <div class="card-header bg-success">
                <h5 class="card-title">Ruang Diskusi</h5>
            </div>
            <div class="card-body">
            <span class="badge badge-danger">42</span> Belum Dibaca
            </div>
            <div class="d-flex flex-row-reverse card-footer text-muted">
                <!-- <a href="#" class="card-link btn btn-primary">Card link</a> -->
                <a href="#" class="card-link btn btn-success" data-toggle="tooltip" title="Menuju Ruang Diskusi"><i class="fas fa-external-link-alt"></i></a>
            </div>
        </div>
    </div>

    <div class="shadow bg-white rounded my-3">
        <div class="card  h-100" style="width: 18rem;">
            <div class="card-header bg-success">
                <h5 class="card-title">Arsip</h5>
            </div>
            <div class="card-body">
            <span class="badge badge-danger">42</span> Arsip Belum Dibaca
            </div>
            <div class="d-flex flex-row-reverse card-footer text-muted">
                <!-- <a href="#" class="card-link btn btn-primary">Card link</a> -->
                <a href="#" class="card-link btn btn-success" data-toggle="tooltip" title="Menuju Arsip"><i class="fas fa-external-link-alt"></i></a>
            </div>
        </div>
    </div>

</div>
@endsection