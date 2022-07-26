@extends('../petugas/layouts/master')

@section('container')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data User</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">ID User</th>
                        <th class="text-center">ID Role</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">NIP</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Password</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">ID User</th>
                        <th class="text-center">ID Role</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">NIP</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Password</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <th class="text-center">{{ $item->ID_USER }}</th>
                            <th class="text-center">{{ $item->ID_ROLE }}</th>
                            <th class="text-center">{{ $item->NAMA }}</th>
                            <th class="text-center">{{ $item->NIP }}</th>
                            <th class="text-center">{{ $item->USERNAME }}</th>
                            <th class="text-center">{{ $item->PASSWORD }}</th>
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