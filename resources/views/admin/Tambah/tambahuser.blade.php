@extends('../admin/layouts/master')

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
            <h1 class="h4 text-gray-900 mb-4">Tambahkan User!</h1>
        </div>
        <form action="/role-form" method="POST">
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
                        placeholder="Nama" name="NAMA">
                </div>
            </div><div class="form-group row">
                <div class="col-sm-4 mt-2">
                    <h1 class="h6">NIP</h1>
                </div>
                <div class="col-sm-1 mt-2">
                    <h1 class="h6">:</h1>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                        placeholder="NIP" name="NIP">
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
                    <select name="role" id="role" class="form-control text-center">
                        <option class="form-control" value="0" disabled selected hidden>Pilih Role</option>
                        {{-- @foreach ($role as $item)
                            <option value="{{ $item->ID_ROLE }}">{{ $item->ROLE }}</option>
                        @endforeach --}}
                    </select>
                    {{-- <a href="" class="h6 text-end" data-toggle="modal" data-target="#modalTambahBarang">preview</a> --}}
                    <div class="modal fade" id="modalPreview" tabindex="-1" aria-labelledby="modalPreview" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" id="modalType">

                            </div>
                        </div>
                    </div>

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
                        placeholder="Username" name="USERNAME">
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
                    <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                        placeholder="Password" name="PASSWORD">
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
