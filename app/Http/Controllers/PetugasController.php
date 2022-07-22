<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lokasi;

class PetugasController extends Controller
{
    function lokasi(){
        $lokasi = Lokasi::all();
        return view('petugas/lokasi', ['lokasi' => $lokasi]);
        // return view('admin.lokasi');
    }

    function lokasisend(Request $request){
        $lokasi = Lokasi::where('id_lokasi', $request->lokasi)->all();
        $barang = Barang::where('id', $lokasi->ID);
        die(var_dump($lokasi));
        if($barang->get()){
            return view('petugas/barang', ['lokasi' => $lokasi, 'barang' => $barang]);
        } else {
            return back()->with('tambahError', 'Data tidak ditemukan');
        }
        // return view('petugas/lokasi', ['lokasi' => $lokasi]);
        // return view('admin.lokasi');
    }
}
