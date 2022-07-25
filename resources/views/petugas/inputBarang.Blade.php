@extends('../petugas/layouts/master')

@section('container')

<div class="">
    <div class="p-5">
        {{-- @if (session()->has('tambahError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('tambahError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif --}}
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Tambahkan Barang!</h1>
        </div>
        <form action="/petugas-barang-input" method="POST">
            <div class="form-group row">
                <div class="col-sm-4 mt-2">
                    <h1 class="h6">No. Register</h1>
                </div>
                <div class="col-sm-1 mt-2">
                    <h1 class="h6">:</h1>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                        placeholder="No Register" name="noRegister">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4 mt-2">
                    <h1 class="h6">Kode Barang</h1>
                </div>
                <div class="col-sm-1 mt-2">
                    <h1 class="h6">:</h1>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                        placeholder="Kode Barang" name="kodeBarang">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4 mt-2">
                    <h1 class="h6">Type Barang</h1>
                </div>
                <div class="col-sm-1 mt-2">
                    <h1 class="h6">:</h1>
                </div>
                <div class="col-sm-7">
                    <select name="type" id="type" class="form-control text-center">
                        <option class="form-control" disabled selected hidden>Pilih Type</option>
                        @foreach ($type as $item)
                            <option value="{{ $item->ID_TYPE }}">{{ $item->TYPE }}</option>
                        @endforeach
                    </select>
                    {{-- <a href="" class="h6 text-end" data-toggle="modal" data-target="#modalTambahBarang">preview</a> --}}
                    <button type="button" id="btn-preview" class="btn btn-info float-right mt-1" data-toggle="modal" data-target="#modalPreview">Preview Gambar Type</button>

                    <div class="modal fade" id="modalPreview" tabindex="-1" aria-labelledby="modalPreview" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" id="modal">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4 mt-2">
                    <h1 class="h6">Satuan Barang</h1>
                </div>
                <div class="col-sm-1 mt-2">
                    <h1 class="h6">:</h1>
                </div>
                <div class="col-sm-7">
                    <select name="satuan" class="form-control text-center">
                        <option class="form-control" value="" disabled selected hidden>Pilih Satuan</option>
                        @foreach ($satuan as $item)
                            <option value="{{ $item->ID_SATUAN }}">{{ $item->SATUAN }}</option>
                        @endforeach
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
                        placeholder="Nama Barang" name="barang">
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
                        placeholder="Merk Barang" name="barang">
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
                        placeholder="Nilai Barang" name="barang">
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
                    <select name="satuan" class="form-control text-center">
                        <option class="form-control" value="" disabled selected hidden>Pilih Tahun</option>
                        <?php  
                            $year = date('Y');
                            $year = (int) $year;
                        ?>
                        @for ($i=0; $i<10; $i++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        <?php 
                            $year--;
                        ?>
                        @endfor
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
                            <input type="radio" id="html" name="keadaanBarang" value="HTML">
                            <label for="html">Baik</label><br>
                        </div>
                        <div class="col-sm-4 text-center">
                            <input type="radio" id="html" name="keadaanBarang" value="HTML">
                            <label for="html">Kurang Baik</label><br>
                        </div>
                        <div class="col-sm-4 text-center">
                            <input type="radio" id="html" name="keadaanBarang" value="HTML">
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
                            <input type="radio" id="html" name="keberadaanBarang" value="HTML">
                            <label for="html">Ada</label><br>
                        </div>
                        <div class="col-sm-6 text-center">
                            <input type="radio" id="html" name="keberadaanBarang" value="HTML">
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
                        placeholder="Nilai Barang" name="barang">
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
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <a href="/admin-mahasiswa" class="btn btn-danger btn-user btn-block">
                        Batal
                    </a>
                </div>
                <div class="col-sm-6">
                    <button type="submit" name="submit" class="btn btn-success btn-user btn-block">
                        Tambah
                    </button>
                </div>
            </div>
            <hr>
        </form>
    </div>
</div>

<div class="cek">

</div>

@endsection    
