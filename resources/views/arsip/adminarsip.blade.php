@extends('layout')

@section('content')
<script>
    var arsipCreateUrl = "{{ route('administrator.arsip.createArsip') }}";
    var arsipUpdateUrl = "{{ route('administrator.arsip.updateArsip') }}";
    var cUserId = "{{ Auth()->user()->id }}";
    var cEmail = "{{ Auth()->user()->email }}";
</script>

<div class="d-flex flex-warp divborder divborder-default my-3">
    <div class="flex-fill">
        <h3 class="text-muted">Admin Arsip</h3>
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
                    <button name="{{ route('administrator.arsip.deleteArsip') }}" class="btn btn-success hapusArsip" data-toggle="tooltip" title="Hapus Arsip Ini"><i class="fas fa-minus-circle"></i></button> &nbsp;&nbsp;&nbsp;
                    <button name="{{ route('administrator.arsip.getArsip') }}" class="btn btn-success editArsip" data-toggle="tooltip" title="Edit Arsip Ini"><i class="fas fa-pen-square"></i></button> &nbsp;&nbsp;&nbsp;
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalCreateArsip"><i class="fas fa-plus-circle" data-toggle="tooltip" title="Tambah Arsip"></i></a> &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-success" href="{{ route('administrator.arsip.downloadArsip', $arsip->judul) }}" target="_blank"><i class="fa fa-download" data-toggle="tooltip" title="Download Arsip Ini"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

<!-- The Modal Create Arsip -->
<div class="modal" id="modalCreateArsip" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Arsip</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formarsipcreate" method="post" action="{{ route('administrator.arsip.createArsip') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <div class="form-group">
                <label for="ringkasan">Ringkasan</label>
                <textarea class="form-control" id="ringkasan" name="ringkasan" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="arsip">Arsip</label>
                <input type="file" name="file" class="form-control-file" id="file">
            </div> 
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnCreateArsip">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- The Modal Update Arsip -->
<div class="modal" id="modalUpdateArsip" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Arsip</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formarsipupdate" method="post" action="{{ route('administrator.arsip.updateArsip') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label for="ujudul">Judul</label>
                <input type="text" class="form-control" id="ujudul" name="ujudul" readonly>
            </div>
            <div class="form-group">
                <label for="uringkasan">Ringkasan</label>
                <textarea class="form-control" id="uringkasan" name="uringkasan" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="uarsip">Arsip</label>
                <input type="file" name="ufile" class="form-control-file" id="ufile">
            </div> 
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnUpdateArsip">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

