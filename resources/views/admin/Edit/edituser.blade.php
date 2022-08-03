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
            <h1 class="h4 text-gray-900 mb-4">Ubah Data User!</h1>
        </div>
        <form action="/update-user-form{{ $data->ID_USER }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group row">
                <div class="col-sm-4 mt-2">
                    <h1 class="h6">Nama</h1>
                </div>
                <div class="col-sm-1 mt-2">
                    <h1 class="h6">:</h1>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                    name="NAMA" value="{{ $data->NAMA}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4 mt-2">
                    <h1 class="h6">NIP</h1>
                </div>
                <div class="col-sm-1 mt-2">
                    <h1 class="h6">:</h1>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                    name="NIP" value="{{ $data->NIP}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4 mt-2">
                    <h1 class="h6">Jabatan</h1>
                </div>
                <div class="col-sm-1 mt-2">
                    <h1 class="h6">:</h1>
                </div>
                <div class="col-sm-7">
                    <select name="ID_JABATAN" id="jabatan" class="form-control text-center">
                        <option class="form-control" hidden selected value="{{ $data->ID_JABATAN}}" >{{ $data->jabatan->JABATAN }}</option>
                        @foreach ($jabatan as $item)
                            <option value="{{ $item->ID_JABATAN }}">{{ $item->JABATAN }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4 mt-2">
                    <h1 class="h6">Role</h1>
                </div>
                <div class="col-sm-1 mt-2">
                    <h1 class="h6">:</h1>
                </div>
                <div class="col-sm-7">
                    <select name="ID_ROLE" id="role" class="form-control text-center">
                        <option class="form-control" hidden selected value="{{ $data->ID_ROLE}}" >{{ $data->role->ROLE }}</option>
                        @foreach ($role as $item)
                            <option value="{{ $item->ID_ROLE }}">{{ $item->ROLE }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4 mt-2">
                    <h1 class="h6">Username</h1>
                </div>
                <div class="col-sm-1 mt-2">
                    <h1 class="h6">:</h1>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                    name="USERNAME" value="{{ $data->USERNAME}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4 mt-2">
                    <h1 class="h6">Password</h1>
                </div>
                <div class="col-sm-1 mt-2">
                    <h1 class="h6">:</h1>
                </div>
                <div class="col-sm-7">
                    <input type="password" class="form-control form-control-user text-center" id="exampleFirstName"
                    name="PASSWORD" value="{{ $data->PASSWORD}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <a href="/admin-user" class="btn btn-danger btn-user btn-block">
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
