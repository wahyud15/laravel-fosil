@extends('layout')

@section('content')
<script>
    var penilaianCreateUrl = "{{ route('administrator.penilaian.createPenilaian') }}";
    var cUserId = "{{ Auth()->user()->id }}";
    var cEmail = "{{ Auth()->user()->email }}";
</script>

<div class="d-flex flex-warp divborder divborder-default my-3">
    <div class="flex-fill">
        <h3 class="text-muted">Penilaian</h3>
    </div>
</div>

<div class="d-flex flex-wrap justify-content-between divborder divborder-default my-3">
    <div class="shadow bg-white rounded my-3">
        <div class="bd-highlight">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">#</th>
                        <th scope="col" rowspan="2" class="align-middle">Nama Pejabat Fungsional</th>
                        <th scope="col" rowspan="2" class="align-middle">Periode</th>
                        <th scope="col" rowspan="2" class="align-middle">Tahun</th>
                        <th scope="col" colspan="2" class="text-center">Diterima TU</th>
                        <th scope="col" colspan="3" class="text-center">Penilai I</th>
                        <th scope="col" colspan="3" class="text-center">Penilai II</th>

                    </tr>
                    <tr>
                        <th scope="col" class="align-middle">Tanggal</th>
                        <th scope="col" class="align-middle">Petugas</th>
                        <th scope="col" class="align-middle">Nama</th>
                        <th scope="col" class="align-middle">Tgl. Mulai</th>
                        <th scope="col" class="align-middle">Tgl. Selesai</th>
                        <th scope="col" class="align-middle">Nama</th>
                        <th scope="col" class="align-middle">Tgl. Mulai</th>
                        <th scope="col" class="align-middle">Tgl. Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penilaian as $nilai)
                    <tr>
                        <th scope="row">{{$nilai->id}}</th>
                        <td>{{$nilai->nama_pejabat_fungsional}}</td>
                        <td>{{$nilai->periode_dupak}}</td>
                        <td>{{$nilai->tahun}}</td>
                        <td>{{$nilai->tgl_terima_tu}}</td>
                        <td>{{$nilai->petugas_terima_tu}}</td>
                        <td>{{$nilai->penilai1_nama}}</td>
                        <td>{{$nilai->penilai1_tglmulai}}</td>
                        <td>{{$nilai->penilai1_tglselesai}}</td>
                        <td>{{$nilai->penilai2_nama}}</td>
                        <td>{{$nilai->penilai2_tglmulai}}</td>
                        <td>{{$nilai->penilai2_tglselesai}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection