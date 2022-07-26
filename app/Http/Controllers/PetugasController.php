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

    // function lokasisend(Request $request){
    //     $lokasi = Lokasi::where('id_lokasi', $request->lokasi)->first();
    //     // die(var_dump($lokasi->ID));
    //     $barang = Barang::where('id', $lokasi->ID)->get();
    //     // die(var_dump($barang));
    //     return view('petugas/barang', ['lokasi' => $lokasi, 'barang' => $barang]);
    //     // return view('petugas/lokasi', ['lokasi' => $lokasi]);
    //     // return view('admin.lokasi');
    // }

    function lokasisend($idlokasi){
        $lokasi = Lokasi::where('id_lokasi', $idlokasi)->first();
        // die(var_dump($lokasi->ID));
        $barang = Barang::where('id', $lokasi->ID)->get();
        // die(var_dump($barang));
        return view('petugas/barang', ['lokasi' => $lokasi, 'barang' => $barang]);
        // return view('petugas/lokasi', ['lokasi' => $lokasi]);
        // return view('admin.lokasi');
    }

    function inputBarang($idlokasi){
        $type = Type::all();
        $satuan = Satuan::all();
        $lokasi = Lokasi::where('id_lokasi', $idlokasi)->first();
        return view('petugas/inputBarang', ['lokasi' => $lokasi, 'type' => $type, 'satuan' => $satuan]);
    }

    function previewType(Request $request){
        $idType = $request->id_type;
        if ($request->id_type != 0){
        $type = Type::where('id_type', $idType)->first();
        ?>
            <div class="modal-header">
                <h5 class="modal-title">Preview Type : <?= $type->TYPE ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="../assets/img/<?= $type->PATH_GAMBAR ?>" alt="">
            </div>
        <?php
        } else {
            ?>
                <div class="modal-header">
                    <h5 class="modal-title">Preview Type : (?)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="" alt="">
                    <h1 class="h4">Pilih type untuk melihat preview gambar</h1>
                </div>
            <?php
        }
    }

    function previewBarang(Request $request){
        $noRegister = $request->no_register;
        if ($request->no_register != null){
        $barang = Barang::where('no_register', $noRegister)->first();
        ?>
            <div class="modal-header">
                <h5 class="modal-title">Preview Barang : <?= $barang->NAMA_BARANG ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img style="width: 400px;" src="../storage/img-barang/<?= $barang->PATH_FOTO ?>" alt="Gambar <?= $barang->NAMA_BARANG ?>">
            </div>
        <?php
        } 
    }

    function saveBarang(Request $request){
        $lokasi = Lokasi::where('id',$request->idLokasi)->first();

        $barang = new Barang;
        $barang->NO_REGISTER = $request->noRegister;
        $barang->KODE_BARANG = $request->kodeBarang;
        $barang->ID = $request->idLokasi;
        $barang->ID_USER = 1;
        $barang->ID_TYPE = $request->type;
        $barang->ID_SATUAN = $request->satuan;
        $barang->NAMA_BARANG = $request->namaBarang;
        $barang->MERK = $request->merkBarang;
        $barang->HARGA = (float)$request->nilaiBarang;
        $barang->TAHUN_PENGADAAN = $request->tahunPengadaan;
        $barang->KONDISI_BARANG = $request->kondisiBarang;
        $barang->KEBERADAAN_BARANG = (int)$request->keberadaanBarang;
        $barang->KETERANGAN = $request->keterangan;

        $filenameWithExt = $request->file('gambarBarang')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('gambarBarang')->getClientOriginalExtension();
        $filenameSimpan = $filename.'_'.time().'.'.$extension;

        // die(var_dump($request->file('gambarBarang')));
        // die(var_dump($request->file('gambarBarang')->getClientOriginalExtension()));
        // die(var_dump($filenameSimpan));
        


        if($request->file('gambarBarang')){
            $barang->PATH_FOTO = $filenameSimpan;
            $request->file('gambarBarang')->move('storage/img-barang', $filenameSimpan);
            // $path = $request->file('gambarBarang');
            // $path->move('../assets/img', $filenameSimpan);
            if($barang->save()){
                // die(var_dump($barang));
                return redirect("/petugas-barang-input/$lokasi->ID_LOKASI");
            } else 
                return back();
        } else 
            return back();

        // $type = Type::all();
        // $satuan = Satuan::all();
        // return view('petugas/inputBarang', ['type' => $type, 'satuan' => $satuan]);
    }
}
