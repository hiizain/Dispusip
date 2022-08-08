<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="../assets/img/surabaya.png">
    <title>SIMBADA DISPUSIP Kota Surabaya</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
@php
    use Illuminate\Support\Facades\Auth;
    use App\User;
    $nip = Auth::user()->nip;
    $user = User::where('nip', $nip)->first();
    $user = $user->NAMA;
@endphp
<body onload="toast()" class="bg-img">

    <div class="row justify-content-center align-items-center mt-5">
        <div class="toast align-items-center mt-3 z-index-master position-absolute" data-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Selamat datang {{ $user }}. Silahkan pilih lokasi anda!
                </div>
                <button type="button" class="close mr-2" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>

    <div class="container mt-3 pt-2 z-index-1 position-relative">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center mt-5 pt-5">

            <div class="col-xl-5 col-lg-6 col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Pilih Lokasi Anda!</h1>
                                    </div>
                                    {{-- <form class="user" action="/petugas-barang" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <select name="lokasi" id="lokasi" class="form-control text-center">
                                                <option class="form-control" value="" disabled selected hidden>Pilih Lokasi</option>
                                                @foreach ($lokasi as $item) 
                                                    <option class="form-control" value="{{ $item->ID_LOKASI }}">{{ $item->LOKASI }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Pilih
                                        </button>
                                    </form> --}}
                                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                                    <div class="form-group">
                                        <select name="lokasi" id="lokasi" class="form-control text-center">
                                            <option class="form-control" value="0" disabled selected hidden>Pilih Lokasi</option>
                                            @foreach ($lokasi as $item) 
                                                <option class="form-control" value="{{ $item->KODE_LOKASI }}">{{ $item->LOKASI }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <a class="btn btn-primary btn-user btn-block" id="lokasiDipilih">Pilih</a> --}}
                                    <a class="btn btn-primary btn-user btn-block" id="lokasiDipilih" data-toggle="modal" data-target="#modalPreview">Pilih</a>
                                    <div class="modal fade" id="modalPreview" tabindex="-1" aria-labelledby="modalPreview" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content" id="modalAlertLokasi">
                
                                            </div>
                                        </div>
                                    </div>
                                    <div id="cek">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>
    <script src="../assets/js/aplikasi/petugas.js"></script>

</body>

</html>