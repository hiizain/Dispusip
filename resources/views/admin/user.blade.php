@extends('../admin/layouts/master')

@section('container')
@if (session()->has('tambahSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
    {{ session('tambahSuccess') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session()->has('updateSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
    {{ session('updateSuccess') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session()->has('hapus'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
    {{ session('hapus') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data User</h6>
            </div>
            <div class="col-sm-6 py-2">
                <span style="float: right">  
                    <a href="/tambah-user"><button class="btn btn-info"><i class="fas fa-plus-circle">&nbsp;</i>Tambah User</button></a>
                </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">ID Jabatan</th>
                        <th class="text-center">ID Role</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">NIP</th>
                        {{-- <th class="text-center">Password</th> --}}
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">ID Jabatan</th>
                        <th class="text-center">ID Role</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">NIP</th>
                        {{-- <th class="text-center">Password</th> --}}
                        <th class="text-center">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($user as $item)
                        <tr>
                            <th class="text-center">{{ $no }}</th>
                            <th class="text-center">{{ $item->jabatan->JABATAN }}</th>
                            <th class="text-center">{{ $item->role->ROLE }}</th>
                            <th class="text-center">{{ $item->NAMA }}</th>
                            <th class="text-center">{{ $item->NIP }}</th>
                            {{-- <th class="text-center">{{ $item->PASSWORD }}</th> --}}
                            <th class="text-center">
                                <a href="/edit-user{{$item->ID_USER}}"><button type="button" class="btn btn-primary tombol">Edit</button></a>
                                <a href="/hapus-user{{$item->ID_USER}}"><button type="button" class="btn btn-danger tombol">Hapus</button></a>
                            </th>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="cek">

</div>

@endsection