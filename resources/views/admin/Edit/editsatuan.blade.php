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
            <h1 class="h4 text-gray-900 mb-4">Ubah Data Satuan!</h1>
        </div>
        <form action="/update-satuan-form{{ $data->ID_SATUAN }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group row">
                <div class="col-sm-4 mt-2">
                    <h1 class="h6">Satuan</h1>
                </div>
                <div class="col-sm-1 mt-2">
                    <h1 class="h6">:</h1>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                        name="SATUAN" value="{{ $data->SATUAN}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <a href="/admin-satuan" class="btn btn-danger btn-user btn-block">
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
