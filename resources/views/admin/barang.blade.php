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
                        <th class="text-center">No.</th>
                        <th class="text-center">No Register</th>
                        <th class="text-center">Kode Barang</th>
                        <th class="text-center">Lokasi</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Gambar Barang</th>
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
                        <th class="text-center">No.</th>
                        <th class="text-center">No Register</th>
                        <th class="text-center">Kode Barang</th>
                        <th class="text-center">Lokasi</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Gambar Barang</th>
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
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($barang as $item)
                        <tr>
                            <td class="text-center">{{ $no }}</td>
                            <td class="text-center">{{ $item->NO_REGISTER }}</td>
                            <td class="text-center">{{ $item->KODE_BARANG }}</td>
                            <td class="text-center">{{ $item->lokasi->LOKASI }}</td>
                            <td class="text-center">{{ $item->NAMA_BARANG }}</td>
                            <td class="text-center">
                                <img onclick="modalBarang(this.src)" width="120" height="80" src="storage/img-barang/{{ $item->PATH_FOTO }}" alt="">
                            </td>
                            <td class="text-center">{{ $item->merek->MEREK }}</td>
                            <td class="text-center">{{ $item->type->TYPE }}</td>
                            <td class="text-center">{{ "Rp " . number_format($item->HARGA,2,',','.') }}</td>
                            <td class="text-center">{{ $item->TAHUN_PENGADAAN }}</td>
                            @if ($item->KONDISI_BARANG === "1")
                                <td class="text-center">Baik</td>
                            @endif 
                            @if ($item->KONDISI_BARANG === "2")
                                <td class="text-center">Kurang Baik</td>
                            @endif 
                            @if ($item->KONDISI_BARANG === "3")
                                <td class="text-center">Rusak Berat</td>
                            @endif
                            @if ($item->KEBERADAAN_BARANG === "1")
                                <td class="text-center">Ada</td>
                            @endif 
                            @if ($item->KEBERADAAN_BARANG === "2")
                                <td class="text-center">Tidak Ada</td>
                            @endif
                            <td class="text-center">{{ $item->KETERANGAN }}</td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="modal fade bd-example-modal-lg" id="modalPreview" tabindex="-1" aria-labelledby="modalPreview" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" id="modalBarang">
                        <div class="modal-header">
                            <h5 class="modal-title">Gambar Barang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <img id="imgModalBarang" style="height: 430px;" src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection