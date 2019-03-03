@extends('layout')

@section('content')
<script>
    var ruangdiskusiSubmitkomentarUrl = "{{ route('administrator.ruangdiskusi.submitkomentar') }}";
    var namatable = "{{ $judulruangdiskusi }}";
    var hkomentar = "";
    var husername ="";
    var hupdatedat = "";
    var hruangdiskusi = "";
</script>
<div class="d-flex flex-warp divborder divborder-default my-3">
    <div class="flex-fill">
        <h3 class="text-muted">{{ $judulruangdiskusi }}</h3>
    </div>
</div>

<div class="d-flex flex-warp divborder">
    <div class="flex-fill">
        @foreach ($komentars as $komentar)
        <div class="rpesan rpesan-info shadow my-3">
            <p class="text-muted username">{{ $komentar->email }} <span class="time-right">{{ $komentar->updated_at }}</span> </p>
            <div class="d-flex flex-row box-body">
                <img src="{{ asset($komentar->avatarname) }}" alt="Avatar" class="h-100">
                <p class="komentar">{!! nl2br(e($komentar->komentar)) !!}</p>
            </div>
            @if($komentar->email == Auth()->user()->email OR  Auth()->user()->level == '9')
            <div class="d-flex flex-row-reverse box-footer">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button name="{{route('detaildiskusi.getKomentar')}}" class="btn btn-success editKomentar"  data-toggle="modal" data-target="#modalUpdateKomentar">Update</button>
                    <button name="{{route('detaildiskusi.deleteKomentar')}}" class="btn btn-warning deleteKomentar">Delete</button>
                </div>
            </div>
            @endif
        </div>
        @endforeach
        
        <div class="box-footer shadow">
              <div class="input-group">
                <textarea id="isikomentar" class="form-control" type='text' placeholder="Type message..."></textarea>
                &nbsp; &nbsp;
                <div class="input-group-btn">
                  <button name="{{route('detaildiskusi.updateKomentar')}}" type="button" class="btn btn-success submitkomentar"><i class="fa fa-plus"></i></button>
                </div>
              </div>
        </div>
    </div>
</div>

<div class="modal" id="modalUpdateKomentar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Komentar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formkomentarupdate" method="post" action="{{route('detaildiskusi.updateKomentar')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <textarea type="text" class="form-control" id="ukomentar" name="ukomentar"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnUpdateKomentar">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

