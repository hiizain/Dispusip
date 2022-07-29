@extends('../admin/layouts/master')

@section('container')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Lokasi</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <div class="form-group form-button">
                        <a href="/tambah-lokasi"><button class="btn btn-info">Tambah Lokasi</button></a>
                    </div>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">ID Lokasi</th>
                        <th class="text-center">Lokasi</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lokasi as $item)
                        <tr>
                            <th class="text-center">{{ $item->ID_LOKASI }}</th>
                            <th class="text-center">{{ $item->KODE_LOKASI }}</th>
                            <th class="text-center">{{ $item->LOKASI }}</th>
                            <th class="text-center">
                                <a href="/edit-lokasi{{$item->ID_LOKASI}}"><button type="button" class="btn btn-primary tombol">Edit</button></a>
                                <a href="/hapus-lokasi{{$item->ID_LOKASI}}"><button type="button" class="btn btn-danger tombol">Hapus</button></a>
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