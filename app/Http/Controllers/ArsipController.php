<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arsip;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $marsip = DB::table('marsip')->get();
        return view('arsip.arsip', ['marsip' => $marsip]);
    }

    public function administratorArsip(){
        $marsip = DB::table('marsip')->get();
        return view('arsip.adminarsip', ['marsip' => $marsip]);
    }

    public function createArsip(Request $request){

        $arsip = new Arsip;
        $arsip->userid = Auth()->user()->id;
        $arsip->email = Auth()->user()->email;
        $arsip->judul = $request->judul;
        $arsip->ringkasan = $request->ringkasan;
        $arsip->file = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('files',time()."-".$request->file('file')->getClientOriginalName());
        $arsip->linkdownload = $path;

        $request->validate([
            'judul' => 'required|unique:marsip,judul',
            'ringkasan' => 'required|unique:marsip,ringkasan',
            'file' => 'required|mimes:pdf',
        ]);

        if($arsip->save()){
            return response()->json(['respond'=>"Arsip dengan Judul $arsip->judul berhasil disimpan", 'status' => '1', 'judul'=>"$arsip->judul", 'linkdownload'=>"$arsip->linkdownload"]);
        }else{
            return response()->json(['respond'=>"Gagal Menyimpan Data", 'status' => '0']);
        }
        
    }

    public function getArsip(Request $request){
        $arsip = DB::table('marsip')
                    ->where('judul',"$request->judul")
                    ->get();
        
        return $arsip->toJson();
    }

    public function updateArsip(Request $request){
                    
        $request->validate([
            'uringkasan' => 'required',
            'ufile' => 'required|mimes:pdf',
        ]);

        $path = $request->file('ufile')->storeAs('files',time()."-".$request->file('ufile')->getClientOriginalName());

        $updateStatus = DB::table('marsip')
            ->where('judul', $request->ujudul)
            ->update([
                'ringkasan' => $request->uringkasan,
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

    public function deleteArsip(Request $request){
        $arsip = DB::table('marsip')
                    ->where('judul',"$request->djudul")
                    ->get();

        //delete File On Storage
        $deleteFileOnStorage = Storage::delete($arsip[0]->linkdownload);

        //delete Record On Database
        $deleteStatus = DB::table('marsip')
                            ->where('judul', $request->djudul)
                            ->delete();
        
        if ($deleteStatus){
            return response()->json(['respond'=>"Data Berhasil Dihapus", 'status' => '1']);
        }else{
            return response()->json(['respond'=>"Data Gagal Dihapus", 'status' => '0']);
        }
    }

    public function downloadArsip($judul){
        $arsip = DB::table('marsip')->where('judul', $judul)->get();

        $file = '../storage/app/'.$arsip[0]->linkdownload;
        $name = basename($file);
        return response()->file($file);
    }
}
