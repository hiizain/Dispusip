@extends('../admin/layouts/master')

@section('container')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <div class="form-group form-button">
                        <a href="/tambah-barang"><button class="form-btn primary-default-btn transparent-btn">Tambah Barang</button></a>
                    </div>
                    <tr>
                        <th class="text-center">No Register</th>
                        <th class="text-center">Kode Barang</th>
                        <th class="text-center">Lokasi</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Merk</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Nilai Nominal</th>
                        <th class="text-center">Tahun Pengadaan</th>
                        <th class="text-center">Kondisi Barang</th>
                        <th class="text-center">Keberadaan Barang</th>
                        <th class="text-center">Keterangan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">No Register</th>
                        <th class="text-center">Kode Barang</th>
                        <th class="text-center">Lokasi</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Merk</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Nilai Nominal</th>
                        <th class="text-center">Tahun Pengadaan</th>
                        <th class="text-center">Kondisi Barang</th>
                        <th class="text-center">Keberadaan Barang</th>
                        <th class="text-center">Keterangan</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($barang as $item)
                        <tr>
                            <th class="text-center">{{ $item->NO_REGISTER }}</th>
                            <th class="text-center">{{ $item->KODE_BARANG }}</th>
                            <th class="text-center">{{ $item->ID }}</th>
                            <th class="text-center">{{ $item->NAMA_BARANG }}</th>
                            <th class="text-center">{{ $item->MERK }}</th>
                            <th class="text-center">{{ $item->ID_TYPE }}</th>
                            <th class="text-center">{{ $item->HARGA }}</th>
                            <th class="text-center">{{ $item->TAHUN_PENGADAAN }}</th>
                            <th class="text-center">{{ $item->KONDISI_BARANG }}</th>
                            <th class="text-center">{{ $item->KEBERADAAN_BARANG }}</th>
                            <th class="text-center">{{ $item->KETERANGAN }}</th>
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