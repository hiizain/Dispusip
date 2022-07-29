@extends('../admin/layouts/master')

@section('container')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Jabatan</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <div class="form-group form-button">
                        <a href="/tambah-jabatan"><button class="btn btn-info">Tambah Jabatan</button></a>
                    </div>
                    <tr>
                        <th class="text-center">ID Jabatan</th>
                        <th class="text-center">Nama Jabatan</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">ID Jabatan </th>
                        <th class="text-center">Nama Jabatan</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($jabatan as $item)
                        <tr>
                            <th class="text-center">{{ $item->ID_JABATAN }}</th>
                            <th class="text-center">{{ $item->JABATAN}}</th>
                            <th class="text-center">
                                <a href="/edit-jabatan{{$item->ID_JABATAN}}"><button type="button" class="btn btn-primary tombol">Edit</button></a>
                                <a href="/hapus-jabatan{{$item->ID_JABATAN}}"><button type="button" class="btn btn-danger tombol">Hapus</button></a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="cek">

</div>

@endsection