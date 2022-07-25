<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lokasi;
use App\Barang;

class PetugasController extends Controller
{
    function lokasi(){
        $lokasi = Lokasi::all();
        return view('petugas/lokasi', ['lokasi' => $lokasi]);
        // return view('admin.lokasi');
    }

    function lokasisend(Request $request){
        $lokasi = Lokasi::where('id_lokasi', $request->lokasi)->first();
        // die(var_dump($lokasi->ID));
        $barang = Barang::where('id', $lokasi->ID)->get();
        // die(var_dump($barang));
        return view('petugas/barang', ['lokasi' => $lokasi, 'barang' => $barang]);
        // return view('petugas/lokasi', ['lokasi' => $lokasi]);
        // return view('admin.lokasi');
    }
}
