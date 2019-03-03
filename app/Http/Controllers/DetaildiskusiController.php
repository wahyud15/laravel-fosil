<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetaildiskusiController extends Controller
{
    //
    public function index(){
        return view('ruangdiskusi/detaildiskusi');
    }

    public function updateKomentar(Request $request){
        $request->validate([
            'hkomentar' => 'required',
        ]);

        $namatable = "rinciandiskusi_$request->hruangdiskusi";

        $updateStatus = DB::table($namatable)
        ->where([
            ["email","=", $request->husername],
            ["updated_at","=", $request->hupdatedat]
        ])
        ->update([
            'komentar' => $request->hkomentar,
            'updated_at' => now(),
        ]);
    
        if($updateStatus){
            return response()->json(['respond'=>"Data Berhasil Update", 'status' => '1']);
        }else{
            return response()->json(['respond'=>"Data Gagal Update", 'status' => '0']);
        }
    }

    public function getKomentar(Request $request){
        $namatable = "rinciandiskusi_$request->ruangdiskusi";
        $dataKomentar = DB::table($namatable)
                    ->where("email", $request->username)
                    ->where("updated_at", $request->updatedat)
                    ->get();
        
        return $dataKomentar->toJson();
    }

    public function deleteKomentar(Request $request){
        $namatable = "rinciandiskusi_$request->druangdiskusi";

        //delete Record On Database
        $deleteStatus = DB::table($namatable)
            ->where([
                ["email","=", $request->dusername],
                ["updated_at","=", $request->dupdatedat],
                ["komentar","=", $request->dkomentar],
             ])
            ->delete();

        if ($deleteStatus){
            return response()->json(['respond'=>"Komentar Berhasil Dihapus", 'status' => '1']);
        }else{
            return response()->json(['respond'=>"Komentar Gagal Dihapus", 'status' => '0']);
        }
    }
}
