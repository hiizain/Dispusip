<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lokasi;
use App\Barang;
use App\Type;
use App\Satuan;
use App\User;
use App\Users;
use Hash;
use Auth;

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
        $lokasi = Lokasi::where('kode_lokasi', $idlokasi)->first();
        $barang = Barang::where('id_lokasi', $lokasi->ID_LOKASI)->get();
        return view('petugas/barang', ['lokasi' => $lokasi, 'barang' => $barang]);
    }

    function inputBarang($idlokasi){
        $type = Type::all();
        $satuan = Satuan::all();
        $lokasi = Lokasi::where('kode_lokasi', $idlokasi)->first();
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
                <img style="width: 400px;" src="../assets/img/<?= $type->PATH_GAMBAR ?>" alt="">
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

    function addFormInput(Request $request){
        $satuan = $request->satuan;
        $satuan = json_decode($satuan);
        ?>
        <div class="form-group row">
            <div class="col-sm-4 mt-2">
                <h1 class="h6">Satuan Barang</h1>
            </div>
            <div class="col-sm-1 mt-2">
                <h1 class="h6">:</h1>
            </div>
            <div class="col-sm-7">
                <select name="satuan" class="form-control text-center">
                    <option class="form-control" value="0" disabled selected hidden>Pilih Satuan</option>
                    <?php
                    foreach ($satuan as $item){
                    ?>
                        <option value="<?= $item->ID_SATUAN ?>"><?= $item->SATUAN ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mt-2">
                <h1 class="h6">Nama Barang</h1>
            </div>
            <div class="col-sm-1 mt-2">
                <h1 class="h6">:</h1>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                    placeholder="Nama Barang" name="namaBarang">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mt-2">
                <h1 class="h6">Merk Barang</h1>
            </div>
            <div class="col-sm-1 mt-2">
                <h1 class="h6">:</h1>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                    placeholder="Merk Barang" name="merkBarang">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mt-2">
                <h1 class="h6">Nilai Barang</h1>
            </div>
            <div class="col-sm-1 mt-2">
                <h1 class="h6">:</h1>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                    placeholder="Nilai Barang" name="nilaiBarang">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mt-2">
                <h1 class="h6">Tahun Pengadaan</h1>
            </div>
            <div class="col-sm-1 mt-2">
                <h1 class="h6">:</h1>
            </div>
            <div class="col-sm-7">
                <select name="tahunPengadaan" class="form-control text-center">
                    <option class="form-control" value="" disabled selected hidden>Pilih Tahun</option>
                    <?php  
                        $year = date('Y');
                        $year = (int) $year;
                    
                    for ($i=0; $i<10; $i++){
                    ?>
                        <option value="<?= $year ?>"><?= $year ?></option>
                    <?php 
                        $year--;
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mt-2">
                <h1 class="h6">Kondisi Barang</h1>
            </div>
            <div class="col-sm-1 mt-2">
                <h1 class="h6">:</h1>
            </div>
            <div class="col-sm-7 mt-2">
                <div class="row justify-content-center">
                    <div class="col-sm-4 text-center">
                        <input type="radio" id="html" name="kondisiBarang" value="1">
                        <label for="html">Baik</label><br>
                    </div>
                    <div class="col-sm-4 text-center">
                        <input type="radio" id="html" name="kondisiBarang" value="2">
                        <label for="html">Kurang Baik</label><br>
                    </div>
                    <div class="col-sm-4 text-center">
                        <input type="radio" id="html" name="kondisiBarang" value="3">
                        <label for="html">Rusak Berat</label><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mt-2">
                <h1 class="h6">Koberadaan Barang</h1>
            </div>
            <div class="col-sm-1 mt-2">
                <h1 class="h6">:</h1>
            </div>
            <div class="col-sm-7 mt-2">
                <div class="row justify-content-center">
                    <div class="col-sm-6 text-center">
                        <input type="radio" id="html" name="keberadaanBarang" value="1">
                        <label for="html">Ada</label><br>
                    </div>
                    <div class="col-sm-6 text-center">
                        <input type="radio" id="html" name="keberadaanBarang" value="3">
                        <label for="html">Tidak Ada</label><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mt-2">
                <h1 class="h6">Gambar</h1>
            </div>
            <div class="col-sm-1 mt-2">
                <h1 class="h6">:</h1>
            </div>
            <div class="col-sm-7">
                <input type="file" class="form-control form-control-user text-center" id=""
                    placeholder="Gambar Barang" name="gambarBarang">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mt-2">
                <h1 class="h6">Keterangan</h1>
            </div>
            <div class="col-sm-1 mt-2">
                <h1 class="h6">:</h1>
            </div>
            <div class="col-sm-7">
                <textarea class="form-control form-control-user" name="keterangan" placeholder="Tambah Keterangan" ></textarea>
            </div>
        </div>
        <div class="form-group row justify-content-center mt-5">
            <div class="col-sm-6">
                <button type="submit" id="saveBarang" name="submit" class="btn btn-success btn-user btn-block">
                    Tambah
                </button>
            </div>
        </div>
        <?php
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

    function alertLokasi(){
        ?>
            <div class="modal-header">
                <h5 class="modal-title">Perhatian..!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h1 class="h5">Pilih Lokasi Terlebih Dahulu</h1>
            </div>
        <?php
    }

    function saveBarang(Request $request){
        $this->validate($request, [
            'no_register' => 'required|unique:barang|max:25',
            'kodeBarang' => 'required|max:20',
            'type' => 'required',
            'satuan' => 'required',
            'namaBarang' => 'required|max:100',
            'merkBarang' => 'required|max:50',
            'nilaiBarang' => 'required|max:12',
            'tahunPengadaan' => 'required|min:4|max:4',
            'kondisiBarang' => 'required',
            'keberadaanBarang' => 'required',
            'keterangan' => 'required|max:255',
            'gambarBarang' => 'required',
        ]);

        $lokasi = Lokasi::where('id_lokasi',$request->idLokasi)->first();

        $barang = new Barang;
        $barang->NO_REGISTER = $request->no_register;
        $barang->KODE_BARANG = $request->kodeBarang;
        $barang->ID_LOKASI = $request->idLokasi;
        $barang->ID_USER = 3;
        $barang->ID_TYPE = $request->type;
        $barang->ID_SATUAN = $request->satuan;
        // die(var_dump($request->satuan));
        $barang->NAMA_BARANG = $request->namaBarang;
        $barang->MERK = $request->merkBarang;
        $barang->HARGA = (float)$request->nilaiBarang;
        $barang->TAHUN_PENGADAAN = $request->tahunPengadaan;
        $barang->KONDISI_BARANG = $request->kondisiBarang;
        $barang->KEBERADAAN_BARANG = $request->keberadaanBarang;
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
                return redirect("/petugas-barang-input/$lokasi->KODE_LOKASI")->with('tambahSuccess', 'Data berhasil ditambahkan');
            } else 
                return redirect("/petugas-barang-input/$lokasi->KODE_LOKASI")->with('tambahError', 'Data gagal ditambahkan');
        } else 
            return redirect("/petugas-barang-input/$lokasi->KODE_LOKASI")->with('tambahError', 'Upload Gambar!');

        // $type = Type::all();
        // $satuan = Satuan::all();
        // return view('petugas/inputBarang', ['type' => $type, 'satuan' => $satuan]);
    }

    function reg(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'nip' => 'required|unique:user',
        ]);

        $user = new User;
        $user->ID_JABATAN = 1;
        $user->ID_ROLE = 1;
        $user->NAMA = $request->nama;
        $user->NIP = $request->nip;
        $user->PASSWORD = Hash::make($request->nip);

        $users = new Users;
        $users->NIP = $request->nip;
        $users->PASSWORD = Hash::make($request->nip);

        if($user->save() && $users->save()){
            // die(var_dump($barang));
            return redirect("/");
        } else 
            return back();
    }
}
