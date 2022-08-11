@extends('../admin/layouts/master')

@section('container')
@php
    use Illuminate\Support\Facades\Auth;
    use App\User;
    $nip = Auth::user()->nip;
    $user = User::where('nip', $nip)->first();
    $nama = $user->NAMA;
@endphp

<div class="align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-650">Selamat Datang!</h1>
    <h1 class="h4 mb-0 text-gray-800">{{ $nama }}</h1>
    <h1 class="h6 mb-0 text-gray-600">{{ $user->jabatan->JABATAN }} - ({{ $user->role->ROLE }})</h1>
</div>

<hr class="mt-4">

<!-- Page Heading -->
<div class="row justify-content-center align-items-center">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Data Master</h1>
    </div>
</div>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Barang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($barang) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-regular fa-book"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Lokasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($lokasi) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-light fa-map"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection