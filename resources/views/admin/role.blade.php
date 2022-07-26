@extends('../admin/layouts/master')

@section('container')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Role</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <div class="form-group form-button">
                        <a href="/tambah-lokasi"><button class="form-btn primary-default-btn transparent-btn">Tambah Role</button></a>
                    </div>
                    <tr>
                        <th class="text-center">ID Role</th>
                        <th class="text-center">Role</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">ID Role</th>
                        <th class="text-center">Role</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($role as $item)
                    <tr>
                            <th class="text-center">{{ $item->ID_ROLE }}</th>
                            <th class="text-center">{{ $item->ROLE }}</th>
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