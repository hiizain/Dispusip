@extends('../petugas/layouts/master')

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
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">ID Lokasi</th>
                        <th class="text-center">Lokasi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">ID Lokasi</th>
                        <th class="text-center">Lokasi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td class="text-center">No</td>
                        <td class="text-center">ID Lokasi</td>
                        <td class="text-center">Lokasi</td>
                    </tr>
                    {{-- @foreach ($type as $item)
                        <tr>
                            <th class="text-center">{{ $item->ID_TYPE }}</th>
                            <th class="text-center">{{ $item->TYPE }}</th>
                            <th class="text-center">{{ $item->PATH_GAMBAR }}</th>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="cek">

</div>

@endsection