@extends('../admin/layouts/master')

@section('container')
@if (session()->has('tambahSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
    {{ session('tambahSuccess') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session()->has('updateSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
    {{ session('updateSuccess') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session()->has('hapus'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
    {{ session('hapus') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Lokasi</h6>
            </div>
            <div class="col-sm-6 py-2">
                <span style="float: right">  
                <a href="/tambah-lokasi"><button class="btn btn-info"><i class="fas fa-plus-circle">&nbsp;</i>Tambah Lokasi</button></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">ID Lokasi</th>
                        <th class="text-center">Lokasi</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">ID Lokasi</th>
                        <th class="text-center">Lokasi</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($lokasi as $item)
                        <tr>
                            <td class="text-center">{{ $no }}</td>
                            <td class="text-center">{{ $item->KODE_LOKASI }}</td>
                            <td class="text-center">{{ $item->LOKASI }}</td>
                            <td class="text-center">
                                <a href="/edit-lokasi{{$item->ID_LOKASI}}"><button type="button" class="btn btn-primary tombol">Edit</button></a>
                                <a href="/hapus-lokasi{{$item->ID_LOKASI}}"><button type="button" class="btn btn-danger tombol">Hapus</button></a>
                            </td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="cek">

</div>

@endsection