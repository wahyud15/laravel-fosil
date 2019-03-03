<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class UsermanController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function administratorUserman(){
        $ruser = DB::table('users')->get();
        return view('userman.adminuserman', ['userman' => $ruser]);
    }

    public function createUser(Request $request){

        $arrayAvt = ['avatars/png/bee.png',
        'avatars/png/bird.png',
        'avatars/png/butterfly.png',
        'avatars/png/deer.png',
        'avatars/png/elephant.png',
        'avatars/png/falcon.png',
        'avatars/png/fish.png',
        'avatars/png/frog.png',
        'avatars/png/giraffe.png',
        'avatars/png/lion.png',
        'avatars/png/owl.png',
        'avatars/png/panda.png',
        'avatars/png/pinguin.png',
        'avatars/png/stork.png'];

        $ruser = new User;
        $ruser->name = $request->nama;
        $ruser->email = $request->username;
        $ruser->password = bcrypt($request->password);
        $ruser->level = $request->level;
        $ruser->avatarname = $arrayAvt[rand(0,14)];

        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,email',
            'password' => 'required',
            'level' => 'required',
        ]);

        if($ruser->save()){
            return response()->json(['respond'=>"Pengguna atas nama $ruser->name berhasil disimpan", 'status' => '1']);
        }else{
            return response()->json(['respond'=>"Gagal Menyimpan Data", 'status' => '0']);
        }
        
    }

    public function updateUser(Request $request){

        $request->validate([
            'unama' => 'required',
            'upassword' => 'required',
            'ulevel' => 'required',
        ]);

        $updateStatus = DB::table('users')
            ->where('id',$request->uidrow)
            ->update([
                "name" =>  $request->unama,
                "email" => $request->uusername,
                "password" => bcrypt($request->upassword),
                "updated_at" => now(),
            ]);

        if($updateStatus){
            return response()->json(['respond'=>"Update Pengguna Berhasil", 'status' => '1']);
        }else{
            return response()->json(['respond'=>"Gagal Menyimpan Data", 'status' => '0']);
        }
        
    }

    public function getUser(Request $request){
        $ruser = DB::table('users')
            ->where('id',"$request->idrow")
            ->get();

        return $ruser->toJson();    
    }

    public function deleteUser(Request $request){

        //delete Record On Database
        $deleteStatus = DB::table('users')
                            ->where('id', $request->didrow)
                            ->delete();
        
        if ($deleteStatus){
            return response()->json(['respond'=>"Pengguna Berhasil Dihapus", 'status' => '1']);
        }else{
            return response()->json(['respond'=>"Pengguna Gagal Dihapus", 'status' => '0']);
        }
    }

}
