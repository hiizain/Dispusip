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
        <form action="/admin-mahasiswa-create" method="post">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <select name="type" class="form-control text-center">
                        <option class="form-control" value="" disabled selected hidden>Pilih Type</option>
                        @foreach ($type as $item)
                            <option value="{{ $item->ID_TYPE }}">{{ $item->TYPE }}</option>
                        @endforeach
                    </select>
                    <a href="" class="h6 text-end">preview</a>
                </div>
                <div class="col-sm-6">
                    <select name="satuan" class="form-control text-center">
                        <option class="form-control" value="" disabled selected hidden>Pilih Satuan</option>
                        @foreach ($satuan as $item)
                            <option value="{{ $item->ID_SATUAN }}">{{ $item->SATUAN }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                        placeholder="Nama Barang" name="barang">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                        placeholder="Merk" name="merk">
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                        placeholder="Harga" name="harga">
                </div>
            </div>
            <div class="form-group">
                <select name="satuan" class="form-control text-center">
                    <option class="form-control" value="" disabled selected hidden>Pilih Satuan</option>
                    @foreach ($satuan as $item)
                        <option value="{{ $item->ID_SATUAN }}">{{ $item->SATUAN }}</option>
                    @endforeach
                </select>
                {{-- <input type="email" class="form-control form-control-user text-center" id="exampleFirstName"
                        placeholder="Email" name="email"> --}}
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

@endsection    
