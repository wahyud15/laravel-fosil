@extends('layout')

@section('content')
<script>
    var pengumumanCreateUrl = "{{ route('administrator.pengumuman.createPengumuman') }}";
    var cUserId = "{{ Auth()->user()->id }}";
    var cEmail = "{{ Auth()->user()->email }}";
</script>

<div class="d-flex flex-warp divborder divborder-default my-3">
    <div class="flex-fill">
        <h3 class="text-muted">Admin Pengumuman</h3>
    </div>
</div>

<div class="d-flex flex-wrap justify-content-between divborder divborder-default my-3">
    @foreach ($mpengumuman as $pengumuman)
    <div class="shadow bg-white rounded my-3">
        <div class="card" style="width: 18rem;">
            <div class="card-header bg-success">
                <h5 class="card-title">{{ $pengumuman->judulpengumuman }}</h5>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">{{ $pengumuman->created_at }} oleh {{ $pengumuman->email }}</h6>
                <p class="card-text">{{ $pengumuman->ringkasanpengumuman }}</p> 
            </div>
            <div class="card-footer text-muted">
                <button name="{{ route('administrator.pengumuman.deletePengumuman') }}" class="btn btn-success hapusPengumuman" data-toggle="tooltip" title="Hapus Pengumuman Ini"><i class="fas fa-minus-circle"></i></button> &nbsp;&nbsp;&nbsp;
                <button name="{{ route('administrator.pengumuman.getPengumuman') }}" class="btn btn-success editPengumuman" data-toggle="tooltip" title="Edit Pengumuman Ini"><i class="fas fa-pen-square"></i></button> &nbsp;&nbsp;&nbsp;
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalCreatePengumuman"><i class="fas fa-plus-circle" data-toggle="tooltip" title="Tambah Pengumuman"></i></a> &nbsp;&nbsp;&nbsp;
                <a class="btn btn-success" href="{{ route('administrator.pengumuman.downloadPengumuman', $pengumuman->judulpengumuman) }}" target="_blank"><i class="fas fa-scroll" data-toggle="tooltip" title="Download Pengumuman Ini"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>


<!-- The Modal Create Pengumuman -->
<div class="modal" id="modalCreatePengumuman" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pengumuman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formpengumumancreate" method="post" action="{{ route('administrator.pengumuman.createPengumuman') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label for="judulpengumuman">Judul Pengumuman</label>
                <input type="text" class="form-control" id="judulpengumuman" name="judulpengumuman">
            </div>
            <div class="form-group">
                <label for="ringkasanpengumuman">Ringkasan</label>
                <textarea class="form-control" id="ringkasanpengumuman" name="ringkasanpengumuman" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="file">Pengumuman</label>
                <input type="file" name="file" class="form-control-file" id="file">
            </div> 
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnCreatePengumuman">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- The Modal Update Pengumuman -->
<div class="modal" id="modalUpdatePengumuman" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Pengumuman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formpengumumanupdate" method="post" action="{{ route('administrator.pengumuman.updatePengumuman') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label for="ujudulpengumuman">Judul Pengumuman</label>
                <input type="text" class="form-control" id="ujudulpengumuman" name="ujudulpengumuman" readonly>
            </div>
            <div class="form-group">
                <label for="uringkasanpengumuman">Ringkasan</label>
                <textarea class="form-control" id="uringkasanpengumuman" name="uringkasanpengumuman" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="upengumuman">Pengumuman</label>
                <input type="file" name="ufile" class="form-control-file" id="ufile">
            </div> 
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnUpdatePengumuman">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

