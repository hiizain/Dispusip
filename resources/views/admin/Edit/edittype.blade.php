@extends('../admin/layouts/master')

@section('container')

<div class="">
    <div class="p-5">
        @if (session()->has('updateError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('updateError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Ubah Data Tipe!</h1>
        </div>
        <form action="/update-type-form{{ $data->ID_TYPE }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="{{ $data->ID_TYPE}}" value="{{ $data->TYPE}}">
            <div class="form-group row">
                <div class="col-sm-4 mt-2">
                    <h1 class="h6">Tipe</h1>
                </div>
                <div class="col-sm-1 mt-2">
                    <h1 class="h6">:</h1>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="form-control form-control-user text-center" id="TYPE"
                        name="type" value="{{ $data->TYPE}}">
                </div>                
            </div>
            <div class="form-group row">
                <div class="col-sm-4 mt-2">
                    <h1 class="h6">Satuan</h1>
                </div>
                <div class="col-sm-1 mt-2">
                    <h1 class="h6">:</h1>
                </div>
                <div class="col-sm-7">
                    <select name="satuan" id="satuan" class="form-control text-center">
                        <option class="form-control" hidden selected value="{{ $data->ID_SATUAN}}" >{{ $data->satuan->SATUAN }}</option>
                        @foreach ($satuan as $item)
                            <option value="{{ $item->ID_SATUAN }}">{{ $item->SATUAN }}</option>
                        @endforeach
                    </select>
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
                    <img width="200px" src="../storage/img-type/{{ $data->PATH_GAMBAR}}" alt=""><br>
                    <input type="file" class="ml-3" id="gambarType"
                        placeholder="Gambar Type" name="gambarType">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <a href="/admin-type" class="btn btn-danger btn-user btn-block">
                        Batal
                    </a>
                </div>
                <div class="col-sm-6">
                    <button type="submit" name="submit" class="btn btn-success btn-user btn-block">
                        Edit
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
