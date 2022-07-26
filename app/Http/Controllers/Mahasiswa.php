<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bimbingan;
use App\Models\Penelitian;
use App\Models\Sidang;
use App\Models\Admin;
use App\Models\Mahasiswa as MHS;
use Illuminate\Support\Facades\Auth;

class Mahasiswa extends Controller
{
    public function index(){
        $mahasiswa = MHS::where('NIM',Auth::user()->username)->first();
        return view('mahasiswa/welcome', ['mahasiswa'=>$mahasiswa]);
    }

    public function penelitian(){
        $penelitian = Penelitian::where('NIM',Auth::user()->username)->get();
        return view('mahasiswa/penelitian', ['penelitian'=>$penelitian]);
    }

    public function tambahPenelitian(){
        return view('mahasiswa/tambah/penelitian');
    }

    public function createPenelitian(Request $request){
        $penelitian = new Penelitian;
        $penelitian->NIM = Auth::user()->username;
        $penelitian->JUDUL_TA = $request->judul_ta;
        $penelitian->STATUS = 1;
        if($penelitian->save()){
            return redirect('/mahasiswa-penelitian')->with('tambahSuccess', 'Data berhasil ditambahkan');
        } else {
            return back()->with('tambahError', 'Data gagal ditambahkan');
        }
    }

    public function bimbingan(){
        $penelitian = Penelitian::where('NIM',Auth::user()->username)->get('ID_PENELITIAN');
        $a=0;
        foreach ($penelitian as $item){
        $array[$a] = $item->ID_PENELITIAN;
        $a++;
        }
        $bimbingan = Bimbingan::whereIn('ID_PENELITIAN', $array)->orderBy('TANGGAL', 'desc')->get();
        return view('mahasiswa/bimbingan', ['bimbingan'=>$bimbingan]);
    }

    public function tambahBimbingan(){
        $penelitian = Penelitian::where('NIM',Auth::user()->username)->get();
        return view('mahasiswa/tambah/bimbingan', ['penelitian'=>$penelitian]);
    }

    public function createBimbingan(Request $request){
        $mahasiswa = MHS::where('NIM', Auth::user()->username)->first();
        $bimbingan = new Bimbingan;
        $bimbingan->ID_PENELITIAN = $request->id_penelitian;
        $bimbingan->NIP = $mahasiswa->NIP_DOSEN_PEMBIMBING;
        $bimbingan->TANGGAL = $request->tanggal;
        $bimbingan->STATUS = 2;
        $bimbingan->PATH_LAPORAN_TA = 
        $bimbingan->LAPORAN_TA = $request->file('laporan_ta')->getClientOriginalName();

        if($request->file('laporan_ta')){
            $bimbingan->PATH_LAPORAN_TA = $request->file('laporan_ta')->store('file-laporan');
            if($bimbingan->save()){
                return redirect('/mahasiswa-bimbingan')->with('tambahSuccess', 'Data berhasil ditambahkan');
            } else 
                return back()->with('tambahError', 'Data gagal ditambahkan');
        } else 
            return back()->with('tambahError', 'Data gagal ditambahkan');
    }

    public function ajukanSidang(Request $request){
        $mahasiswa = MHS::where('NIM', Auth::user()->username)->first();
        $paa = Admin::where('PRODI', $mahasiswa->PRODI)->first();
        $idPAA = $paa->ID_PEG;
        $nipDosbing = $mahasiswa->NIP_DOSEN_PEMBIMBING;
        $sidang = new Sidang;
        $sidang->NIM = Auth::user()->username;
        $sidang->ID_PEG = $idPAA;
        $sidang->NIP = $nipDosbing;
        $sidang->STATUS = 2;
        $bimbingan = Bimbingan::where('ID_BIMBINGAN', $request->id)->first();
        $sidang->LAPORAN_TA_FINAL = $bimbingan->LAPORAN_TA;
        $sidang->PATH_LAPORAN_TA_FINAL = $bimbingan->PATH_LAPORAN_TA;

        if($sidang->save()){
            return redirect('/mahasiswa-sidang')->with('tambahSuccess', 'Data berhasil ditambahkan');
        } else 
            return back()->with('tambahError', 'Data gagal ditambahkan');
    }

    public function sidang(){
        $sidang = Sidang::where('NIM', Auth::user()->username)->get();
        return view('mahasiswa/sidang', ['sidang'=>$sidang]);
    }

    
}
