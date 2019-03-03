<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $mpengumuman = DB::table('mpengumuman')->get();
        return view('pengumuman.pengumuman', ['mpengumuman' => $mpengumuman]);
    }

    public function administratorPengumuman(){
        $mpengumuman = DB::table('mpengumuman')->get();
        return view('pengumuman.adminpengumuman', ['mpengumuman' => $mpengumuman]);
    }

    public function createPengumuman(Request $request){

        $pengumuman = new Pengumuman;
        $pengumuman->userid = Auth()->user()->id;
        $pengumuman->email = Auth()->user()->email;
        $pengumuman->judulpengumuman = $request->judulpengumuman;
        $pengumuman->ringkasanpengumuman = $request->ringkasanpengumuman;
        $pengumuman->file = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('files',time()."-".$request->file('file')->getClientOriginalName());
        $pengumuman->linkdownload = $path;

        $request->validate([
            'judulpengumuman' => 'required|unique:marsip,judul',
            'ringkasanpengumuman' => 'required|unique:marsip,ringkasan',
            'file' => 'required|mimes:pdf',
        ]);

        if($pengumuman->save()){
            return response()->json(['respond'=>"Pengumuman dengan Judul $pengumuman->judulpengumuman berhasil disimpan", 'status' => '1', 'judulpengumuman'=>"$pengumuman->judulpengumuman", 'linkdownload'=>"$pengumuman->linkdownload"]);
        }else{
            return response()->json(['respond'=>"Gagal Menyimpan Data", 'status' => '0']);
        }
        
    }

    public function getPengumuman(Request $request){
        $pengumuman = DB::table('mpengumuman')
                    ->where('judulpengumuman',"$request->judulpengumuman")
                    ->get();
        
        return $pengumuman->toJson();
    }

    public function updatePengumuman(Request $request){
                    
        $request->validate([
            'uringkasanpengumuman' => 'required',
            'ufile' => 'required|mimes:pdf',
        ]);

        $path = $request->file('ufile')->storeAs('files',time()."-".$request->file('ufile')->getClientOriginalName());

        $updateStatus = DB::table('mpengumuman')
            ->where('judulpengumuman', $request->ujudulpengumuman)
            ->update([
                'ringkasanpengumuman' => $request->uringkasanpengumuman,
                'file' => $request->file('ufile')->getClientOriginalName(),
                'linkdownload' => $path,
                'updated_at' => now(),
            ]);
        
        if($updateStatus){
            return response()->json(['respond'=>"Data Berhasil Update", 'status' => '1']);
        }else{
            return response()->json(['respond'=>"Data Gagal Update", 'status' => '0']);
        }
        
    }

    public function deletePengumuman(Request $request){
        $pengumuman = DB::table('mpengumuman')
                    ->where('judulpengumuman',"$request->djudulpengumuman")
                    ->get();

        //delete File On Storage
        $deleteFileOnStorage = Storage::delete($pengumuman[0]->linkdownload);

        //delete Record On Database
        $deleteStatus = DB::table('mpengumuman')
                            ->where('judulpengumuman', $request->djudulpengumuman)
                            ->delete();
        
        if ($deleteStatus){
            return response()->json(['respond'=>"Data Berhasil Dihapus", 'status' => '1']);
        }else{
            return response()->json(['respond'=>"Data Gagal Dihapus", 'status' => '0']);
        }
    }

    public function downloadPengumuman($judulpengumuman){
        $pengumuman = DB::table('mpengumuman')
                    ->where('judulpengumuman', $judulpengumuman)
                    ->get();

        $file = '../storage/app/'.$pengumuman[0]->linkdownload;
        $name = basename($file);
        return response()->file($file);
    }
}
