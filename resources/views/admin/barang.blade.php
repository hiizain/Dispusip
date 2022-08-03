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
        <div class="table-responsive">
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
                    @foreach ($barang as $item)
                        <tr>
                            <th class="text-center">{{ $item->NO_REGISTER }}</th>
                            <th class="text-center">{{ $item->KODE_BARANG }}</th>
                            <th class="text-center">{{ $item->ID }}</th>
                            <th class="text-center">{{ $item->NAMA_BARANG }}</th>
                            <th class="text-center">{{ $item->MERK }}</th>
                            <th class="text-center">{{ $item->type->TYPE }}</th>
                            <th class="text-center">{{ $item->HARGA }}</th>
                            <th class="text-center">{{ $item->TAHUN_PENGADAAN }}</th>
                            @if ($item->KONDISI_BARANG === "1")
                                <th class="text-center">Baik</th>
                            @endif 
                            @if ($item->KONDISI_BARANG === "2")
                                <th class="text-center">Kurang Baik</th>
                            @endif 
                            @if ($item->KONDISI_BARANG === "3")
                                <th class="text-center">Rusak Berat</th>
                            @endif
                            @if ($item->KEBERADAAN_BARANG === "1")
                                <th class="text-center">Ada</th>
                            @endif 
                            @if ($item->KONDISI_BARANG === "2")
                                <th class="text-center">Tidak Ada</th>
                            @endif
                            <th class="text-center">{{ $item->KETERANGAN }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection