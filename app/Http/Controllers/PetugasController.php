<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lokasi;
use App\Barang;
use App\Type;
use App\Satuan;

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

    function inputBarang(){
        $type = Type::all();
        $satuan = Satuan::all();
        return view('petugas/inputBarang', ['type' => $type, 'satuan' => $satuan]);
    }

    function previewType(Request $request){
        $idType = $request->id_type;
        $type = Type::where('id_type', $idType)->first();
        ?>
            <div class="modal-header">
                <h5 class="modal-title">Preview Type <?= $type->TYPE ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="assets/img/<?= $type->PATH_GAMBAR ?>" alt="">
            </div>
        <?php
    }
}
