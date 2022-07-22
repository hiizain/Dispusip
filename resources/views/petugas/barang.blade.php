@extends('../admin/layouts/master')

@section('container')

<div class="row justify-content-center">
    <div class="col-sm-5 p-5">
        <div class="text-center">
            {{-- <h1 class="h4 text-gray-900 mb-4">Data Barang {{ $lokasi->LOKASI }}</h1> --}}
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Baramg</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
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
                    {{-- @foreach ($barang as $item) --}}
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
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="cek">

</div>

@endsection