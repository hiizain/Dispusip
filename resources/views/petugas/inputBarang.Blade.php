<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="../assets/img/surabaya.png">
    <title>SIMBADA DISPUSIP Kota Surabaya</title>

    <!-- Custom fonts for this template -->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top" onload="form()">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <img style="width: 40px" src="../assets/img/surabaya.png" alt="">
                    {{-- <i class="fas fa-hand-holding-medical"></i> --}}
                </div>
                <div class="sidebar-brand-text mx-3">PETUGAS SIMBADA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="/petugas-barang/{{ $lokasi->KODE_LOKASI }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Petugas
            </div>

            <li class="nav-item">
                <a href="/petugas-barang-input/{{ $lokasi->KODE_LOKASI }}" class="nav-link" id="urlBarangInput">
                    <i class="fas fa-laptop-medical"></i>
                    <span>Input Barang</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="/petugas-barang/{{ $lokasi->KODE_LOKASI }}" class="nav-link" id="urlBarang">
                    <i class="fas fa-th-list"></i>
                    <span>Barang</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/petugas-lokasi">
                    <i class="fas fa-map-marked-alt"></i>
                    <span>Ganti Lokasi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @php
                                    use Illuminate\Support\Facades\Auth;
                                    use App\User;
                                    use App\Type;
                                    $nip = Auth::user()->nip;
                                    $user = User::where('nip', $nip)->first();
                                @endphp
                                <div>
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 normal"><?= $user->NAMA; ?></span><br>
                                    <span class="mr-2 d-none d-lg-inline text-gray-500 small"><?= $user->role->ROLE;?></span>
                                </div>
                                <img class="img-profile rounded-circle"
                                    src="../assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <form action="/logout" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="dropdown-item" href="/logout">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="" id="input">
                        <div class="p-5">

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tambahkan Barang!</h1>
                            </div>
                            @if(session()->has('tambahSuccess'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('tambahSuccess') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if(session()->has('tambahError'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('tambahError') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (count($errors) > 0)
                            <div class="row alert alert-danger">
                                <div class="col-md-11">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            @endif
                            <form action="/petugas-barang-input" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="idUser" value="{{ $user->ID_USER }}">
                                <input type="hidden" id="lokasi" name="idLokasi" value="{{ $lokasi->ID_LOKASI }}">
                                <input type="hidden" name="idUser" value="{{ $user->ID_USER }}">
                                <div class="form-group row">
                                    <div class="col-sm-4 mt-2">
                                        <h1 class="h6">No. Register</h1>
                                    </div>
                                    <div class="col-sm-1 mt-2">
                                        <h1 class="h6">:</h1>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                                            placeholder="No Register" name="no_register" value="{{ old('no_register') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mt-2">
                                        <h1 class="h6">Kode Barang</h1>
                                    </div>
                                    <div class="col-sm-1 mt-2">
                                        <h1 class="h6">:</h1>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                                            placeholder="Kode Barang" name="kodeBarang" value="{{ old('kodeBarang') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mt-2">
                                        <h1 class="h6">Type Barang</h1>
                                    </div>
                                    <div class="col-sm-1 mt-2">
                                        <h1 class="h6">:</h1>
                                    </div>
                                    <div class="col-sm-7">
                                        {{-- @php
                                            $satuans = json_encode($satuan);
                                        @endphp --}}
                                        {{-- <select name="type" id="type" class="form-control text-center">
                                            <option class="form-control" value="0/{{ $satuans }}" disabled selected hidden>Pilih Type</option>
                                            @foreach ($type as $item)
                                                <option value="{{ $item->ID_TYPE }}/{{ $satuans }}">{{ $item->TYPE }}</option>
                                            @endforeach
                                        </select> --}}
                                        <select name="type" id="type" class="form-control text-center">
                                            <option class="form-control" value="0" disabled selected hidden>Pilih Type</option>
                                            @foreach ($type as $item)
                                                <option value="{{ $item->ID_TYPE }}" {{ old('type') == $item->ID_TYPE ? 'selected' : '' }}>{{ $item->TYPE }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <a href="" class="h6 text-end" data-toggle="modal" data-target="#modalTambahBarang">preview</a> --}}
                                        <button type="button" value="0" id="btn-preview-type" class="btn btn-info float-right mt-1" data-toggle="modal" data-target="#modalPreview">Preview Gambar Type</button>
                    
                                        <div class="modal fade bd-example-modal-lg" id="modalPreview" tabindex="-1" aria-labelledby="modalPreview" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content" id="modalType">
                    
                                                </div>
                                            </div>
                                        </div>
                    
                                    </div>
                                </div>

                                {{-- <div id="form">

                                </div> --}}

                                <div class="form-group row hide" style="display: none;">
                                    <div class="col-sm-4 mt-2">
                                        <h1 class="h6">Merek Barang</h1>
                                    </div>
                                    <div class="col-sm-1 mt-2">
                                        <h1 class="h6">:</h1>
                                    </div>
                                    <div class="col-sm-7">
                                        <select name="merek" class="form-control text-center">
                                            <option class="form-control" value="0" disabled selected hidden>Pilih Merek</option>
                                            <?php
                                            foreach ($merek as $item){
                                            ?>
                                                <option value="<?= $item->ID_MEREK ?>" {{ old('merek') == $item->ID_MEREK ? 'selected' : '' }}><?= $item->MEREK ?></option>
                                            <?php } ?>
                                        </select>

                                        {{-- <a class="float-right mt-1" href="/petugas-merek-input/{{ $lokasi->KODE_LOKASI }}">Tambah Merek</a> --}}

                                        <a value="0" id="btnAddMerek" class="float-right mt-1" data-toggle="modal" data-target="#modalMerek">Tambah Merek</a>
                    
                                        <div class="modal fade" id="modalMerek" tabindex="-1" aria-labelledby="modalPreview" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content" id="modalAddMerek">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah Merek</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-10" id="errorModal">
                                                        </div>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <div class="form-group">
                                                            <input type="text" id="inputMerek" name="inputMerek" class="form-control form-control-user"
                                                                placeholder="Merek" value="{{ old('merek') }}">
                                                        </div>
                                                        <a class="btn btn-primary btn-user btn-block" onclick="tambahMerek()">Tambah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row hide" style="display: none;">
                                    <div class="col-sm-4 mt-2">
                                        <h1 class="h6">Nama Barang</h1>
                                    </div>
                                    <div class="col-sm-1 mt-2">
                                        <h1 class="h6">:</h1>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                                            placeholder="Nama Barang" name="namaBarang" value="{{ old('namaBarang') }}">
                                    </div>
                                </div>
                                <div class="form-group row hide" style="display: none;">
                                    <div class="col-sm-4 mt-2">
                                        <h1 class="h6">Nilai Barang</h1>
                                    </div>
                                    <div class="col-sm-1 mt-2">
                                        <h1 class="h6">:</h1>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                                            placeholder="Nilai Barang" name="nilaiBarang" value="{{ old('nilaiBarang') }}">
                                    </div>
                                </div>
                                <div class="form-group row hide" style="display: none;">
                                    <div class="col-sm-4 mt-2">
                                        <h1 class="h6">Tahun Pengadaan</h1>
                                    </div>
                                    <div class="col-sm-1 mt-2">
                                        <h1 class="h6">:</h1>
                                    </div>
                                    <div class="col-sm-7">
                                        <select name="tahunPengadaan" class="form-control text-center">
                                            <option class="form-control" value="" disabled selected hidden>Pilih Tahun</option>
                                            <?php  
                                                $year = date('Y');
                                                $year = (int) $year;
                                            
                                            for ($i=0; $i<10; $i++){
                                            ?>
                                                <option value="{{ $year }}" {{ old('tahunPengadaan') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                            <?php 
                                                $year--;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row hide" style="display: none;">
                                    <div class="col-sm-4 mt-2">
                                        <h1 class="h6">Kondisi Barang</h1>
                                    </div>
                                    <div class="col-sm-1 mt-2">
                                        <h1 class="h6">:</h1>
                                    </div>
                                    <div class="col-sm-7 mt-2">
                                        <div class="row justify-content-center">
                                            <div class="col-sm-4 text-center">
                                                <input type="radio" id="html" name="kondisiBarang" value="1" {{ old('kondisiBarang') == 1 ? 'checked' : '' }}>
                                                <label for="html">Baik</label><br>
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <input type="radio" id="html" name="kondisiBarang" value="2" {{ old('kondisiBarang') == 2 ? 'checked' : '' }}>
                                                <label for="html">Kurang Baik</label><br>
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <input type="radio" id="html" name="kondisiBarang" value="3" {{ old('kondisiBarang') == 3 ? 'checked' : '' }}>
                                                <label for="html">Rusak Berat</label><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row hide" style="display: none;">
                                    <div class="col-sm-4 mt-2">
                                        <h1 class="h6">Keberadaan Barang</h1>
                                    </div>
                                    <div class="col-sm-1 mt-2">
                                        <h1 class="h6">:</h1>
                                    </div>
                                    <div class="col-sm-7 mt-2">
                                        <div class="row justify-content-center">
                                            <div class="col-sm-6 text-center">
                                                <input type="radio" id="html" name="keberadaanBarang" value="1" {{ old('keberadaanBarang') == 1 ? 'checked' : '' }}>
                                                <label for="html">Ada</label><br>
                                            </div>
                                            <div class="col-sm-6 text-center">
                                                <input type="radio" id="html" name="keberadaanBarang" value="2" {{ old('keberadaanBarang') == 2 ? 'checked' : '' }}>
                                                <label for="html">Tidak Ada</label><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row hide" style="display: none;">
                                    <div class="col-sm-4 mt-2">
                                        <h1 class="h6">Gambar</h1>
                                    </div>
                                    <div class="col-sm-1 mt-2">
                                        <h1 class="h6">:</h1>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="file" class="form-control form-control-user text-center" id=""
                                            placeholder="Gambar Barang" name="gambarBarang" value="{{ old('gambarBarang') }}">
                                    </div>
                                </div>
                                <div class="form-group row hide" style="display: none;">
                                    <div class="col-sm-4 mt-2">
                                        <h1 class="h6">Keterangan</h1>
                                    </div>
                                    <div class="col-sm-1 mt-2">
                                        <h1 class="h6">:</h1>
                                    </div>
                                    <div class="col-sm-7">
                                        <textarea class="form-control form-control-user" name="keterangan" placeholder="Tambah Keterangan" >{{ old('keterangan') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center mt-5 hide" style="display: none;">
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-success btn-user btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                                            Tambah
                                        </button>

                                        {{-- <a value="0" id="btnAddMerek" class="btn btn-success btn-user btn-block" data-toggle="modal" data-target="#exampleModalCenter">Tambah</a> --}}
                        
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                <div class="modal-body">
                                                    Apakah data inputan sudah benar?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                                                    <button type="submit" name="submit" class="btn btn-primary">Ya</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="cek">
                    
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Aplikasi Inventaris DISPUSIP KOTA SURABAYA 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>
    <script src="../assets/js/aplikasi/petugas.js"></script>

</body>

</html>
