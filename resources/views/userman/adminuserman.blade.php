@extends('layout')

@section('content')
<script>
    var userCreateUrl = "{{route('administrator.userman.create')}}";
    var cUserId = "{{ Auth()->user()->id }}";
    var cEmail = "{{ Auth()->user()->email }}";
</script>

<div class="d-flex flex-warp divborder divborder-default my-3">
    <div class="flex-fill">
        <h3 class="text-muted">Manajemen Pengguna</h3>
    </div>
</div>

<div class="d-flex flex-wrap justify-content-between divborder divborder-default my-3">
    <div class="shadow bg-white rounded my-3">
        <div class="bd-highlight">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col"  class="align-middle">#</th>
                        <th scope="col"  class="align-middle">Nama Pengguna</th>
                        <th scope="col"  class="align-middle">Username</th>
                        <th scope="col"  class="align-middle">Level</th>
                        <th scope="col"  class="align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userman as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->level}}</td>
                        <td>
                            <a href="" class="btn btn-success my-1 getDataUser"  data-toggle="modal" data-target="#modalCreateUser"><i class="fas fa-plus" data-toggle="tooltip" title="Tambah"></i></a>
                            <button name="{{route('administrator.userman.getUser')}}" class="btn btn-success my-1 editUser"  data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></button> 
                            <button name="{{route('administrator.userman.deleteUser')}}" class="btn btn-success my-1 hapusUser" data-toggle="tooltip" title="Hapus"><i class="fas fa-eraser"></i></button> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- The Modal Create User -->
<div class="modal" id="modalCreateUser" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formusercreate" method="post" action="#">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label for="nama">Nama User</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="level">Level</label>
                <select class="form-control" id="level" name="level">
                    <option value="1">Fungsional Statistisi</option>
                    <option value="2">Fungsional Prakom</option>
                    <option value="3">Struktural</option>
                    <option value="4">Tim Penilai Fungsional</option>
                    <option value="9">Administrator</option>
                </select>
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnCreateUser">Submit</button>
        </div>
    </form>
    </div>
</div>
</div>

<!-- The Modal Create User -->
<div class="modal" id="modalUpdateUser" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formuserupdate" method="post" action="{{route('administrator.userman.updateUser')}}">
        {{ csrf_field() }}
        <div class="modal-body">

            <div class="form-group">
                <label for="uidrow">ID Row</label>
                <input type="text" class="form-control" id="uidrow" name="uidrow" readonly>
            </div>

            <div class="form-group">
                <label for="unama">Nama User</label>
                <input type="text" class="form-control" id="unama" name="unama">
            </div>

            <div class="form-group">
                <label for="uusername">Username</label>
                <input type="text" class="form-control" id="uusername" name="uusername" readonly>
            </div>

            <div class="form-group">
                <label for="upassword">Password</label>
                <input type="password" class="form-control" id="upassword" name="upassword">
            </div>

            <div class="form-group">
                <label for="ulevel">Level</label>
                <select class="form-control" id="ulevel" name="ulevel">
                    <option value="1">Fungsional Statistisi</option>
                    <option value="2">Fungsional Prakom</option>
                    <option value="3">Struktural</option>
                    <option value="4">Tim Penilai Fungsional</option>
                    <option value="9">Administrator</option>
                </select>
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnCreateUser">Submit</button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection