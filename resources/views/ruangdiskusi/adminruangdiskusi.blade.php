@extends('layout')

@section('content')
<script>
    var ruangdiskusiCreateUrl = "{{ route('administrator.ruangdiskusi.createRuangdiskusi') }}";
    var cUserId = "{{ Auth()->user()->id }}";
    var cEmail = "{{ Auth()->user()->email }}";
</script>

<div class="d-flex flex-warp divborder divborder-default my-3">
    <div class="flex-fill">
        <h3 class="text-muted">Diskusi - Daftar Tema</h3>
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
                    <button name="{{ route('administrator.ruangdiskusi.deleteRuangdiskusi') }}" class="btn btn-success hapusruangdiskusi" data-toggle="tooltip" title="Hapus Ruang Diskusi Ini"><i class="fas fa-minus-circle"></i></button> &nbsp;&nbsp;&nbsp;
                    <button name="{{ route('administrator.ruangdiskusi.getRuangdiskusi') }}" class="btn btn-success editruangdiskusi" data-toggle="tooltip" title="Edit Ruang Diskusi Ini"><i class="fas fa-pen-square"></i></button> &nbsp;&nbsp;&nbsp;
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalCreateRuangdiskusi"><i class="fas fa-comments" data-toggle="tooltip" title="Tambah Ruang Diskusi"></i></a> &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-success" href="{{ route('ruangdiskusi.gotoRuangdiskusi', $ruangdiskusi->judulruangdiskusi) }}" target="_blank"><i class="fas fa-location-arrow" data-toggle="tooltip" title="Menuju Ruang Diskusi"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- The Modal Create Ruangdiskusi -->
<div class="modal" id="modalCreateRuangdiskusi" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Tambah Ruang Diskusi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formruangdiskusicreate" method="post" action="#">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label for="judulruangdiskusi">Judul Ruang Diskusi</label>
                <input type="text" class="form-control" id="judulruangdiskusi" name="judulruangdiskusi">
            </div>
            <div class="form-group">
                <label for="ringkasan">Ringkasan Ruang Diskusi</label>
                <textarea class="form-control" id="ringkasanruangdiskusi" name="ringkasanruangdiskusi" rows="3"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnCreateRuangdiskusi">Submit</button>
        </div>
    </form>
    </div>
</div>
</div>

<!-- The Modal Update Ruangdiskusi -->
<div class="modal" id="modalUpdateRuangdiskusi" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Ruang Diskusi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formruangdiskusiupdate" method="post" action="{{ route('administrator.ruangdiskusi.updateRuangdiskusi') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label for="ujudulruangdiskusi">Judul Ruang Diskusi</label>
                <input type="text" class="form-control" id="ujudulruangdiskusi" name="ujudulruangdiskusi" readonly>
            </div>
            <div class="form-group">
                <label for="uringkasanruangdiskusi">Ringkasan Ruang Diskusi</label>
                <textarea class="form-control" id="uringkasanruangdiskusi" name="uringkasanruangdiskusi" rows="3"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnUpdateRuangdiskusi">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection