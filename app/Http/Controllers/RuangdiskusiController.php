<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ruangdiskusi;
use Illuminate\Support\Facades\Schema;

class RuangdiskusiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $mruangdiskusi = DB::table('mruangdiskusi')->get();
        return view('ruangdiskusi.ruangdiskusi', ['mruangdiskusi' => $mruangdiskusi]);
    }

    public function administratorRuangdiskusi(){
        $mruangdiskusi = DB::table('mruangdiskusi')->get();
        return view('ruangdiskusi.adminruangdiskusi', ['mruangdiskusi' => $mruangdiskusi]);
    }

    public function gotoRuangdiskusi($judulruangdiskusi){
        if(Schema::hasTable('rinciandiskusi_'.$judulruangdiskusi)){
            $komentars = DB::table('rinciandiskusi_'.$judulruangdiskusi)->get();
            return view('ruangdiskusi.detaildiskusi', ['judulruangdiskusi' => $judulruangdiskusi, 'komentars' => $komentars]);
        }

        echo 'Ruang Diskusi Tidak Ditemukan';
    }

    public function createRuangdiskusi(Request $request){
        $ruangdiskusi = new Ruangdiskusi;
        $ruangdiskusi->userid = Auth()->user()->id;
        $ruangdiskusi->email = Auth()->user()->email;
        $ruangdiskusi->judulruangdiskusi = $request->judulruangdiskusi;
        $ruangdiskusi->ringkasanruangdiskusi = $request->ringkasanruangdiskusi;

        $request->validate([
            'judulruangdiskusi' => 'required|unique:mruangdiskusi,judulruangdiskusi',
            'ringkasanruangdiskusi' => 'required|unique:mruangdiskusi,ringkasanruangdiskusi',
        ]);
        
        if(Schema::hasTable('rinciandiskusi_'.$request->judulruangdiskusi)){
            Schema::dropIfExists('rinciandiskusi_'.$request->judulruangdiskusi);
        }

        Schema::connection('mysql')->create('rinciandiskusi_'.$request->judulruangdiskusi, function($table)
        {
            $table->increments('id');
            $table->integer('userid')->lenth(10)->unsigned();
            $table->string('email');
            $table->string('komentar');
            $table->string('avatarname');
            $table->timestamps();
        });

        if($ruangdiskusi->save()){
            return response()->json(['respond'=>"Ruang Diskusi dengan Judul $ruangdiskusi->judulruangdiskusi berhasil dibuat", 'status' => '1']);
        }else{
            return response()->json(['respond'=>"Gagal Membuat Ruang Diskusi", 'status' => '0']);
        }
    }

    public function submitKomentar(Request $request){
        $userid = Auth()->user()->id;
        $email = Auth()->user()->email;
        $isikomentar = $request->isikomentar;
        $namatabel = "rinciandiskusi_".$request->namatable;

        $statusKomentar = DB::table($namatabel)->insert(
            ['userid'=>$userid, 'email' => $email, 'komentar' => $isikomentar, 'avatarname' => Auth()->user()->getAvatarname() ,'created_at'=>now(), 'updated_at'=>now()]
        );

        if($statusKomentar){
            return response()->json(['response'=>'Komentar berhasil ditambahkan', 'status'=>'1']);
        }else{
            return response()->json(['response'=>'Komentar gagal ditambahkan', 'status'=>'0']);
        }
        
    }

    public function getRuangdiskusi(Request $request){

        $ruangdiskusi = DB::table('mruangdiskusi')
                                ->where('judulruangdiskusi', $request->judulruangdiskusi)
                                ->get();
        
        return $ruangdiskusi->toJson();
    }

    public function updateRuangdiskusi(Request $request){
        $request->validate([
            'uringkasanruangdiskusi' => 'required|unique:mruangdiskusi,ringkasanruangdiskusi',
        ]);

        $updateStatus = DB::table('mruangdiskusi')
        ->where('judulruangdiskusi', $request->ujudulruangdiskusi)
        ->update([
            'ringkasanruangdiskusi' => $request->uringkasanruangdiskusi,
            'updated_at' => now(),
        ]);
    
        if($updateStatus){
            return response()->json(['respond'=>"Data Berhasil Update", 'status' => '1']);
        }else{
            return response()->json(['respond'=>"Data Gagal Update", 'status' => '0']);
        }
    }

    public function deleteRuangdiskusi(Request $request){

        $deleteStatus = DB::table('mruangdiskusi')
                                ->where('judulruangdiskusi', $request->djudulruangdiskusi)
                                ->delete();

        $deletedetaildiskusistatus = "unknown status deletion";

        if(Schema::hasTable('rinciandiskusi_'.$request->djudulruangdiskusi)){
            $deletedetaildiskusistatus =  Schema::dropIfExists('rinciandiskusi_'.$request->djudulruangdiskusi);
        }
        
        if ($deleteStatus){
            return response()->json(['respond'=>"Data Berhasil Dihapus", 'status' => '1', 'deletedetaildiskusistatus' => $deletedetaildiskusistatus]);
        }else{
            return response()->json(['respond'=>"Data Gagal Dihapus", 'status' => '0']);
        }
    }

}
