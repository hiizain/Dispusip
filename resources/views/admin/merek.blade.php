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

@if (session()->has('deleteSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
    {{ session('deleteSuccess') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session()->has('deleteError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align: center">
    {{ session('deleteError') }}
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
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Merek Barang</h6>
            </div>
            <div class="col-sm-6 py-2">
                <span style="float: right">  
                    <a href="/tambah-merek"><button class="btn btn-info"><i class="fas fa-plus-circle">&nbsp;</i>Tambah Merek</button></a>            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Merek</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Merek</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($merek as $item)
                        <tr>
                            <td class="text-center">{{ $no }}</td>
                            <td class="text-center">{{ $item->MEREK }}</td>
                            <td class="text-center">
                                <a href="/edit-merek{{$item->ID_MEREK}}"><button type="button" class="btn btn-primary tombol">Edit</button></a>
                                <a href="/hapus-merek{{$item->ID_MEREK}}"><button type="button" class="btn btn-danger tombol">Hapus</button></a>
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