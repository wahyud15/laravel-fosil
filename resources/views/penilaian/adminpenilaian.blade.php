@extends('layout')

@section('content')
<script>
    var penilaianCreateUrl = "{{ route('administrator.penilaian.createPenilaian') }}";
    var cUserId = "{{ Auth()->user()->id }}";
    var cEmail = "{{ Auth()->user()->email }}";
</script>

<div class="d-flex flex-warp divborder divborder-default my-3">
    <div class="flex-fill">
        <h3 class="text-muted">Admin Penilaian</h3>
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
                        <th scope="col" rowspan="2" class="align-middle">Action</th>
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
                        <td>
                            <a href="" class="btn btn-success my-1 getDataPenilaian"  data-toggle="modal" data-target="#modalCreatePenilaian"><i class="fas fa-plus" data-toggle="tooltip" title="Tambah"></i></a>
                            <button name="{{ route('administrator.penilaian.getPenilaian') }}" class="btn btn-success my-1 editPenilaian"  data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></button> 
                            <button name="{{ route('administrator.penilaian.deletePenilaian') }}" class="btn btn-success my-1 hapusPenilaian" data-toggle="tooltip" title="Hapus"><i class="fas fa-eraser"></i></button> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- The Modal Create Penilaian -->
<div class="modal" id="modalCreatePenilaian" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Tambah Penilaian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formpenilaiancreate" method="post" action="#">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label for="namapejabatfungsional">Nama Pejabat Fungsional</label>
                <select class="form-control" id="namapejabatfungsional" name="namapejabatfungsional">
                   @foreach($namapejabatfungsional as $namafungsional)
                        <option value="{{$namafungsional->name}}">{{$namafungsional->name}}</option>
                   @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="periodedupak">Periode Dupak</label>
                <select class="form-control" id="periodedupak" name="periodedupak">
                    <option value="1">JANUARI-JUNI</option>
                    <option value="2">JULI-DESEMBER</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tahun">Tahun</label>
                <select class="form-control" id="tahun" name="tahun">
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tglterimatu">Tanggal Diterima TU</label>
                <input type="date" class="form-control" name="tglterimatu" id="tglterimatu">
            </div>
            
            <div class="form-group">
                <label for="petugaspenerimatu">Petugas Penerima TU</label>
                <select class="form-control" id="petugaspenerimatu" name="petugaspenerimatu">
                    @foreach($namaadmin as $admin)
                        <option value="{{$admin->name}}">{{$admin->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="penilai1_nama">Nama Penilai I</label>
                <select class="form-control" id="penilai1_nama" name="penilai1_nama">
                    @foreach($namapenilaifungsional as $namapenilai)
                        <option value="{{$namapenilai->name}}">{{$namapenilai->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="penilai1_tglmulai">Tanggal Mulai Penilaian Oleh Penilai I</label>
                <input type="date" class="form-control" name="penilai1_tglmulai" id="penilai1_tglmulai">
            </div>

            <div class="form-group">
                <label for="penilai1_tglselesai">Tanggal Selesai Penilaian Oleh Penilai I</label>
                <input type="date" class="form-control" name="penilai1_tglselesai" id="penilai1_tglselesai">
            </div>

            <div class="form-group">
                <label for="penilai1_nama">Nama Penilai II</label>
                <select class="form-control" id="penilai2_nama" name="penilai2_nama">
                    @foreach($namapenilaifungsional as $namapenilai)
                        <option value="{{$namapenilai->name}}">{{$namapenilai->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="penilai1_tglmulai">Tanggal Mulai Penilaian Oleh Penilai II</label>
                <input type="date" class="form-control" name="penilai2_tglmulai" id="penilai2_tglmulai">
            </div>

            <div class="form-group">
                <label for="penilai1_tglselesai">Tanggal Selesai Penilaian Oleh Penilai II</label>
                <input type="date" class="form-control" name="penilai2_tglselesai" id="penilai2_tglselesai">
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnCreatePenilaian">Submit</button>
        </div>
    </form>
    </div>
</div>
</div>


<!-- The Modal Update Penilaian -->
<div class="modal" id="modalUpdatePenilaian" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Update Penilaian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formpenilaianupdate" method="post" action="{{route('administrator.penilaian.updatePenilaian')}}">
        {{ csrf_field() }}
        <div class="modal-body">

            <div class="form-group">
                <label for="uid">ID Row</label>
                <input type="text" class="form-control" id="uid" name="uid" readonly>
            </div>

            <div class="form-group">
                <label for="unamapejabatfungsional">Nama Pejabat Fungsional</label>
                <select class="form-control" id="unamapejabatfungsional" name="unamapejabatfungsional">
                    @foreach($namapejabatfungsional as $namafungsional)
                        <option value="{{$namafungsional->name}}">{{$namafungsional->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="uperiodedupak">Periode Dupak</label>
                <select class="form-control" id="uperiodedupak" name="uperiodedupak">
                    <option value="1">JANUARI-JUNI</option>
                    <option value="2">JULI-DESEMBER</option>
                </select>
            </div>

            <div class="form-group">
                <label for="utahun">Tahun</label>
                <select class="form-control" id="utahun" name="utahun">
                <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                </select>
            </div>

            <div class="form-group">
                <label for="utglterimatu">Tanggal Diterima TU</label>
                <input type="date" class="form-control" name="utglterimatu" id="utglterimatu">
            </div>
            
            <div class="form-group">
                <label for="upetugaspenerimatu">Petugas Penerima TU</label>
                <select class="form-control" id="upetugaspenerimatu" name="upetugaspenerimatu">
                    @foreach($namaadmin as $admin)
                        <option value="{{$admin->name}}">{{$admin->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="upenilai1_nama">Nama Penilai I</label>
                <select class="form-control" id="upenilai1_nama" name="upenilai1_nama">
                    @foreach($namapenilaifungsional as $namapenilai)
                        <option value="{{$namapenilai->name}}">{{$namapenilai->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="upenilai1_tglmulai">Tanggal Mulai Penilaian Oleh Penilai I</label>
                <input type="date" class="form-control" name="upenilai1_tglmulai" id="upenilai1_tglmulai">
            </div>

            <div class="form-group">
                <label for="upenilai1_tglselesai">Tanggal Selesai Penilaian Oleh Penilai I</label>
                <input type="date" class="form-control" name="upenilai1_tglselesai" id="upenilai1_tglselesai">
            </div>

            <div class="form-group">
                <label for="upenilai1_nama">Nama Penilai II</label>
                <select class="form-control" id="upenilai2_nama" name="upenilai2_nama">
                    @foreach($namapenilaifungsional as $namapenilai)
                        <option value="{{$namapenilai->name}}">{{$namapenilai->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="upenilai1_tglmulai">Tanggal Mulai Penilaian Oleh Penilai II</label>
                <input type="date" class="form-control" name="upenilai2_tglmulai" id="upenilai2_tglmulai">
            </div>

            <div class="form-group">
                <label for="upenilai1_tglselesai">Tanggal Selesai Penilaian Oleh Penilai II</label>
                <input type="date" class="form-control" name="upenilai2_tglselesai" id="upenilai2_tglselesai">
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnUpdatePenilaian">Submit</button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection