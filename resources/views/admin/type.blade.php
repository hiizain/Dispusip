@extends('../petugas/layouts/master')

@section('container')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Tipe</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">ID Type</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Gambar</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">ID Type</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Gambar</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($type as $item)
                        <tr>
                            <th class="text-center">{{ $item->ID_TYPE }}</th>
                            <th class="text-center">{{ $item->TYPE }}</th>
                            <th class="text-center">{{ $item->PATH_GAMBAR }}</th>
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