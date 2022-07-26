<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokasi;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LokasiController extends Controller
{
    function tabellokasi(){
        $lokasi = Lokasi::all();
        return view('/admin.lokasi', ['lokasi' => $lokasi]);
        // return view('admin.lokasi');
    }
}
