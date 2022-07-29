@extends('../admin/layouts/master')

@section('container')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Tipe Barang</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <div class="form-group form-button">
                        <a href="/tambah-type"><button class="btn btn-info">Tambah Tipe Barang</button></a>
                    </div>
                    <tr>
                        <th class="text-center">ID Type</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">ID Type</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($type as $item)
                        <tr>
                            <th class="text-center">{{ $item->ID_TYPE }}</th>
                            <th class="text-center">{{ $item->TYPE }}</th>
                            <th class="text-center">{{ $item->PATH_GAMBAR }}</th>
                            <th class="text-center">
                                <a href="/edit-type{{$item->ID_TYPE}}"><button type="button" class="btn btn-primary tombol">Edit</button></a>
                                <a href="/hapus-type{{$item->ID_TYPE}}"><button type="button" class="btn btn-danger tombol">Hapus</button></a>
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