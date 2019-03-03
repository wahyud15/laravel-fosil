<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penilaian;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $penilaian = DB::table('penilaian')->get();
        return view('penilaian.penilaian', ['penilaian' => $penilaian]);
    }

    public function administratorPenilaian(){
        $penilaian = DB::table('penilaian')->get();

        $namapejabatfungsional = DB::table('users')
            ->select('name')
            ->where('level',"1")
            ->orWhere('level',"2")
            ->get();

        $namapenilaifungsional = DB::table('users')
            ->select('name')
            ->where('level',"4")
            ->get();

        $namaadmin = DB::table('users')
            ->select('name')
            ->where('level',"9")
            ->get();

        return view('penilaian.adminpenilaian', 
                    [
                        'penilaian' => $penilaian,
                        'namapejabatfungsional' => $namapejabatfungsional,
                        'namapenilaifungsional' => $namapenilaifungsional,
                        'namaadmin' => $namaadmin
                    ]);
    }

    public function createPenilaian(Request $request){

        $penilaian = new Penilaian;
        $penilaian->nama_pejabat_fungsional  = $request->namapejabatfungsional;
        $penilaian->periode_dupak = $request->periodedupak;
        $penilaian->tahun = $request->tahun;
        $penilaian->tgl_terima_tu = $request->tglterimatu;
        $penilaian->petugas_terima_tu = $request->petugaspenerimatu;
        $penilaian->penilai1_nama = $request->penilai1_nama;
        $penilaian->penilai1_tglmulai = $request->penilai1_tglmulai;
        $penilaian->penilai1_tglselesai = $request->penilai1_tglselesai;
        $penilaian->penilai2_nama = $request->penilai2_nama;
        $penilaian->penilai2_tglmulai = $request->penilai2_tglmulai;
        $penilaian->penilai2_tglselesai = $request->penilai2_tglselesai;

        $request->validate([
            'namapejabatfungsional' => 'required',
            'periodedupak' => 'required',
            'tahun' => 'required',
            'tglterimatu' => 'required',
            'petugaspenerimatu' => 'required',
        ]);

        if($penilaian->save()){
            return response()->json(['respond'=>"Penilaian atas nama $penilaian->nama_pejabat_fungsional berhasil disimpan", 'status' => '1']);
        }else{
            return response()->json(['respond'=>"Gagal Menyimpan Data", 'status' => '0']);
        }
        
    }

    public function updatePenilaian(Request $request){

        $request->validate([
            'unamapejabatfungsional' => 'required',
            'uperiodedupak' => 'required',
            'utahun' => 'required',
            'utglterimatu' => 'required',
            'upetugaspenerimatu' => 'required',
        ]);

        $updateStatus = DB::table('penilaian')
            ->where('id',$request->uid)
            ->update([
                "nama_pejabat_fungsional" =>  $request->unamapejabatfungsional,
                "periode_dupak" => $request->uperiodedupak,
                "tahun" => $request->utahun,
                "tgl_terima_tu" => $request->utglterimatu,
                "petugas_terima_tu" => $request->upetugaspenerimatu,
                "penilai1_nama" => $request->upenilai1_nama,
                "penilai1_tglmulai" => $request->upenilai1_tglmulai,
                "penilai1_tglselesai" => $request->upenilai1_tglselesai,
                "penilai2_nama" => $request->upenilai2_nama,
                "penilai2_tglmulai" => $request->upenilai2_tglmulai,
                "penilai2_tglselesai" => $request->upenilai2_tglselesai,
                "updated_at" => now(),
            ]);

        if($updateStatus){
            return response()->json(['respond'=>"Penilaian atas nama $request->unamapejabatfungsional berhasil diupdate", 'status' => '1']);
        }else{
            return response()->json(['respond'=>"Gagal Menyimpan Data", 'status' => '0']);
        }
        
    }

    public function deletePenilaian(Request $request){

        //delete Record On Database
        $deleteStatus = DB::table('penilaian')
                            ->where('id', $request->didrow)
                            ->delete();
        
        if ($deleteStatus){
            return response()->json(['respond'=>"Penilaian Berhasil Dihapus", 'status' => '1']);
        }else{
            return response()->json(['respond'=>"Penilaian Gagal Dihapus", 'status' => '0']);
        }
    }

    public function getPenilaian(Request $request){
        $penilaian = DB::table('penilaian')
                    ->where('id',"$request->idrow")
                    ->get();
        
        return $penilaian->toJson();
    }

}
